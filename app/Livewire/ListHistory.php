<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vehicles;
use Illuminate\Contracts\View\View;
use Filament\Tables\Table;
use App\Models\Coordinates;
use Filament\Tables\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListHistory extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Coordinates::whereHas('pojazd', function ($query) {
                    $query->where('user_id', auth()->id());
                })
            )
            ->columns([
                TextColumn::make('pojazd.simID')->sortable()->searchable()->color('info')->label('ID sim'),
                TextColumn::make('created_at')->sortable()->searchable()->color('info')->label('Odebrano'),
                TextColumn::make('latitude')->sortable()->label('latitude'),
                TextColumn::make('longitude')->sortable()->label('longitude'),
                TextColumn::make('strength')->sortable()->searchable()->label('Zasięg [%]')->wrap(),
                TextColumn::make('battery')->sortable()->searchable()->color('Bateria [%]'),
            ])
            ->filters([
                // ...
            ])
            ->headerActions([])
            ->actions([
                Action::make('Mapa')
                    ->action(fn(Coordinates $record) => $record->advance())->modalSubmitAction(false)
                    ->modalContent(fn(Coordinates $record): View => view(
                        'history',
                        ['record' => $record],
                    ))

            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.list-history');
    }
}
