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
            ->query(Vehicles::query())
            ->columns([
                TextColumn::make('Nazwa')->sortable()->searchable()->color('info'),
                IconColumn::make('Status')->sortable()->label('Status')->boolean(),
                IconColumn::make('Odbieranie')->sortable()->label('Odbieranie')->boolean(),
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

                    ])->mutateFormDataUsing(function (array $data): array {
                        $data['user_id'] = auth()->id();

                        return $data;
                    }),
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('Nazwa')->required()->minLength(1)->maxLength(100)->label('Nazwa pojazdu')->helperText('Max 100 znaków'),

                        TextInput::make('Telefon')->required()->unique(ignoreRecord: true)->tel()->minLength(12)->placeholder('+48777888999')->label('Numer telefonu karty sim')->helperText('z numerem kierunkowym'),
                        TextInput::make('simID')->required()->numeric()->unique(ignoreRecord: true)->minLength(9)->maxLength(9)->placeholder('123456789')->label('9 pierwszych liczb id karty sim')->helperText('Tylko liczby całkowite'),
                        TextInput::make('Opis')->nullable()->columnSpanFull()->label('Krótki dodatkowy opis'),
                        Toggle::make('Status')->default(true)->inline(false)->label('Włączone namierzanie')->helperText('Domyślnie tak'),
                    ]),
                DeleteAction::make()

            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.list-vehicles');
    }
}
