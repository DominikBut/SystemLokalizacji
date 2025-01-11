<?php

namespace App\Livewire;

use id;
use Livewire\Component;
use App\Models\Vehicles;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListVehicles extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Lista utworzonych przez ciebie pojazdów.')
            ->description('Wybierz dowolny dostępny pojazd lub dodaj nowy.')
            ->query(Vehicles::query()->where('user_id', auth()->id()))
            ->poll('300s')
            ->emptyStateHeading('Brak pojazdów do wyświetlenia.')
            ->emptyStateDescription('Spróbuj dodać nowy pojazd przyciskiem powyżej.')->emptyStateIcon('heroicon-o-bookmark-slash')
            ->striped()

            ->columns([
                TextColumn::make('index')->label('Lp.')
                    ->rowIndex(),
                TextColumn::make('name')->sortable()->searchable()->color('gray')->label('Pojazd')->limit(15)->wrap()->icon('heroicon-m-truck')->size(TextColumn\TextColumnSize::Medium)->weight(FontWeight::Medium),
                TextColumn::make('sim_id')->sortable()->searchable()->color('info')->label('SIM id')->hidden(),
                TextColumn::make('phone')->sortable()->searchable()->label('Numer telefonu')->badge()
                    ->color('primary')->icon('heroicon-m-phone'),
                IconColumn::make('status')->sortable()->searchable()->label('Śledzenie')->boolean()->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')->alignment(Alignment::Center)->wrapHeader(),
                IconColumn::make('subscribe')->sortable()->searchable()->label('Powiadomienia')->boolean()->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')->alignment(Alignment::Center)->wrapHeader(),
                TextColumn::make('current_route')->sortable()->searchable()->label('Pokonane trasy')->weight(FontWeight::Medium)->numeric()->alignment(Alignment::Center),
                TextColumn::make('description')->sortable()->searchable()->color('gray')->placeholder('Brak.')->wrap()->limit(25)->lineClamp(2),
            ])
            ->filters([
                // ...
            ])
            ->headerActions([
                CreateAction::make()->label('Dodaj nowy pojazd')->icon('heroicon-m-truck')
                    ->model(Vehicles::class)
                    ->modalHeading('Dodaj nowy pojazd.')
                    ->modalDescription('Wypełnij dokładnie poniższy formularz.')
                    ->modalSubmitActionLabel('Utwórz nowy pojazd.')
                    ->form([
                        Section::make()
                            ->schema([
                                TextInput::make('name')->required()->minLength(1)->prefixIcon('heroicon-m-truck')->unique()->maxLength(50)->label('Wyświetlana nazwa pojazdu')->helperText('Max 50 znaków')->helperText('Wpisz dowolną nazwę, która później będzie używana na reszcie stron.'),
                                TextInput::make('phone')->prefixIcon('heroicon-m-phone')->required()->unique()->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->placeholder('+48777888999')->label('Numer telefonu karty SIM')->helperText('Pamiętaj o podaniu numeru kierunkowego!'),
                                TextInput::make('sim_id')->required()->integer()->unique()->length(9)->placeholder('123456789')->label('Numer id karty SIM [9 pierwszych cyfr]')
                                    ->helperText('Na karcie startera telefonicznego, znajduje się kod kreskowy, a pod nim numer złożony z 19-24 cyfr.')->password()
                                    ->revealable(),
                                TextInput::make('description')->nullable()->maxLength(50)->columnSpanFull()->prefixIcon('heroicon-m-document-text')->label('Krótki dodatkowy opis ułatwiający identyfikację.'),
                            ]),
                        Section::make()
                            ->schema([
                                Toggle::make('status')->default(true)->inline(false)->label('Śledzenie')->helperText('Zapisywać przychodzące dane w bazie danych?')->columnSpan(2),
                                Toggle::make('subscribe')->default(false)->inline(false)->label('Powiadomienia email')->helperText('Wysyłać powiadomienia email?')->columnSpan(2),
                            ])->columns(4),
                    ])->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();
                        return $data;
                    })->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Dodano nowy pojazd.')
                            ->color('success')->body('Możesz w dowolnej chwili edytować jego parametry.'),
                    ),
            ])
            ->actions([
                EditAction::make()->label('Edytuj')->button()
                    ->form([
                        Section::make()
                            ->schema([
                                TextInput::make('name')->required()->minLength(1)->prefixIcon('heroicon-m-truck')->unique(ignoreRecord: true)->maxLength(50)->label('Wyświetlana nazwa pojazdu')->helperText('Max 50 znaków')->helperText('Wpisz dowolną nazwę, która później będzie używana na reszcie stron.'),
                                TextInput::make('phone')->prefixIcon('heroicon-m-phone')->required()->unique(ignoreRecord: true)->tel()
                                    ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/')
                                    ->placeholder('+48777888999')->label('Numer telefonu karty SIM')->helperText('Pamiętaj o podaniu numeru kierunkowego!'),
                                TextInput::make('sim_id')->required()->integer()->unique(ignoreRecord: true)->length(9)->placeholder('123456789')->label('Numer id karty SIM [9 pierwszych cyfr]')
                                    ->helperText('Na karcie startera telefonicznego, znajduje się kod kreskowy, a pod nim numer złożony z 19-24 cyfr.')->password()
                                    ->revealable(),
                                TextInput::make('description')->nullable()->maxLength(50)->columnSpanFull()->prefixIcon('heroicon-m-document-text')->label('Krótki dodatkowy opis ułatwiający identyfikację.'),
                            ]),
                        Section::make()
                            ->schema([
                                Toggle::make('status')->default(true)->inline(false)->label('Śledzenie')->helperText('Zapisywać przychodzące dane w bazie danych?')->columnSpan(2),
                                Toggle::make('subscribe')->default(false)->inline(false)->label('Powiadomienia email')->helperText('Wysyłać powiadomienia email?')->columnSpan(2),
                            ])->columns(4),


                    ])->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Zapisano zmiany.')
                            ->body('Edycja pojazdu przebiegła pomyślnie.')->color('success'),
                    )->modalHeading('Edytuj ten pojazd.')
                    ->modalDescription('Zmień wartości wybranych opcji lub ustawień pojazdu.')
                    ->modalSubmitActionLabel('Zapisz zmiany'),
                DeleteAction::make()->label('Usuń')->modalHeading('Usuń ten pojazd.')
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Usunięto pojazd.')
                            ->color('success'),
                    )

            ])
            ->bulkActions([
                // ...
            ])->paginated([10]);
    }
    public function render()
    {
        return view('livewire.list-vehicles');
    }
}
