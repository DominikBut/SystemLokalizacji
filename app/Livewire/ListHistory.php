<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Vehicles;
use Filament\Tables\Table;
use App\Models\Coordinates;
use Filament\Tables\Actions\Action;
use Illuminate\Contracts\View\View;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Contracts\HasForms;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class ListHistory extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Lista wszystkich otrzymanych danych od pojazdów.')
            ->description('Historyczne dane lokalizacji, możesz w dowolnym momencie sprawdzić dane lokalizacji na mapie.')
            ->emptyStateHeading('Brak danych do wyświetlenia.')
            ->emptyStateDescription('Spróbuj najpierw dodać nowy pojazd na stronie "Lista pojazdów"')->emptyStateIcon('heroicon-o-bookmark-slash')
            ->striped()
            ->query(
                Coordinates::whereHas('pojazd', function ($query) {
                    $query->where('user_id', auth()->id());
                })->orderBy('created_at', 'desc')
            )->poll('60s')->striped()
            ->columns([
                TextColumn::make('index')->label('Lp.')
                    ->rowIndex(),
                TextColumn::make('pojazd.Nazwa')->searchable()->color('gray')->label('Pojazd')->limit(15)->wrap()->icon('heroicon-m-truck')->size(TextColumn\TextColumnSize::Medium)->weight(FontWeight::Medium),
                TextColumn::make('pojazd.simID')->searchable()->color('info')->label('SIM id')->hidden(),

                TextColumn::make('created_at')->searchable()->color('info')->label('Odebrano')->formatStateUsing(fn(string $state): string => (
                    Carbon::parse($state)->timezone('Europe/Warsaw')->translatedFormat('j F Y H:i:s')
                )),
                TextColumn::make('latitude')->label('latitude'),
                TextColumn::make('longitude')->label('longitude')->formatStateUsing(fn(string $state): string => (
                    Coordinates::formatCoordinates($state, $state)
                )),
                TextColumn::make('strength')->searchable()->label('Siła sygnału [%]')->badge()->wrap()->alignment(Alignment::Center)->wrapHeader()
                    ->color(fn(string $state): string => (
                        ($state <= 10)
                        ? 'danger' : (($state > 10 and $state <= 50) ? 'warning' : 'primary'
                        )))
                    ->icon('heroicon-m-signal')->iconPosition(IconPosition::After),
                TextColumn::make('battery')->searchable()->label('Poziom baterii [%]')->badge()->wrap()->alignment(Alignment::Center)->wrapHeader()
                    ->color(fn(string $state): string => (
                        ($state <= 10)
                        ? 'danger' : (($state > 10 and $state <= 50) ? 'warning' : 'primary'
                        )))->icon('heroicon-m-battery-100')->iconPosition(IconPosition::After),

            ])
            ->filters([
                // ...
            ])
            ->headerActions([])
            ->actions([
                Action::make('Zobacz na mapie >')
                    ->action(fn(Coordinates $record) => $record->advance())
                    ->url(fn(Coordinates $record): string => route('management.oldmap', ['lokacja' => $record]))
            ])
            ->bulkActions([
                // ...
            ])->paginated([10])->extremePaginationLinks();
    }
    public function render()
    {
        return view('livewire.list-history');
    }
}
