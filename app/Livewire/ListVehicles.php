<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicles;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Concerns\InteractsWithTable;
use id;

class ListVehicles extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Lista dostepnych pojazdów')
            ->description('Wybierz dowolny pojazd lub dodaj nowy.')
            ->query(Vehicles::query()->where('user_id', auth()->id()))
            ->poll('60s')
            ->striped()
            ->columns([
                TextColumn::make('Nazwa')->sortable()->searchable()->color('info')->label('Pojazd'),
                TextColumn::make('simID')->sortable()->searchable()->color('info')->label('SIM id'),
                IconColumn::make('Status')->sortable()->label('Śledzenie')->boolean(),
                IconColumn::make('Odbieranie')->sortable()->label('Aktywność')->boolean(),
                IconColumn::make('subscribe')->sortable()->label('Powiadomienia email')->boolean(),
                TextColumn::make('Telefon')->sortable()->searchable()->label('Telefon')->wrap(),
                TextColumn::make('Opis')->sortable()->searchable()->color('info'),
            ])
            ->filters([
                // ...
            ])
            ->headerActions([
                CreateAction::make()->label('Dodaj pojazd')
                    ->model(Vehicles::class)
                    ->form([
                        TextInput::make('Nazwa')->required()->minLength(1)->maxLength(100)->label('Nazwa pojazdu')->helperText('Max 100 znaków'),

                        TextInput::make('Telefon')->required()->unique()->tel()->minLength(12)->placeholder('+48777888999')->label('Numer telefonu karty sim')->helperText('z numerem kierunkowym'),
                        TextInput::make('simID')->required()->numeric()->unique()->minLength(9)->maxLength(9)->placeholder('123456789')->label('9 pierwszych liczb id karty sim')->helperText('Tylko liczby całkowite'),
                        TextInput::make('Opis')->nullable()->columnSpanFull()->label('Krótki dodatkowy opis'),
                        Toggle::make('Status')->default(true)->inline(false)->label('Włączone namierzanie')->helperText('Domyślnie tak'),
                        Toggle::make('subscribe')->default(false)->inline(false)->label('Włącz powiadomienia')->helperText('Domyślnie tak'),

                    ])->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();

                        return $data;
                    }),
            ])
            ->actions([
                EditAction::make()->label('Edytuj')
                    ->form([
                        TextInput::make('Nazwa')->required()->minLength(1)->maxLength(100)->label('Nazwa pojazdu')->helperText('Max 100 znaków'),

                        TextInput::make('Telefon')->required()->unique(ignoreRecord: true)->tel()->minLength(12)->placeholder('+48777888999')->label('Numer telefonu karty sim')->helperText('z numerem kierunkowym'),
                        TextInput::make('simID')->required()->numeric()->unique(ignoreRecord: true)->minLength(9)->maxLength(9)->placeholder('123456789')->label('9 pierwszych liczb id karty sim')->helperText('Tylko liczby całkowite'),
                        TextInput::make('Opis')->nullable()->columnSpanFull()->label('Krótki dodatkowy opis'),
                        Toggle::make('Status')->default(true)->inline(false)->label('Włączone namierzanie')->helperText('Domyślnie tak'),
                        Toggle::make('subscribe')->default(false)->inline(false)->label('Włącz powiadomienia')->helperText('Domyślnie tak'),

                    ]),
                DeleteAction::make()->label('Usuń')

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
