<?php
namespace App\Livewire;

use App\Models\Shift;
use Carbon\Carbon;
use Filament\Pages\Page;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;

class ShiftDashboard extends Page implements HasInfolists
{
    use InteractsWithInfolists;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    
    protected static string $view = 'livewire.shift-dashboard';
    
    protected static ?string $title = '';

    public $selectedDate;
    public $filterType = 'next'; // 'next', 'previous', 'specific'
    public $shiftRecord;

    public function mount(): void
    {
        $this->selectedDate = now()->format('Y-m-d');
        $this->loadShiftRecord();
    }

    public function loadShiftRecord(): void
    {
        if ($this->filterType === 'specific' && $this->selectedDate) {
            // Get shift for specific date
            $this->shiftRecord = Shift::whereDate('day', Carbon::parse($this->selectedDate))->first();
        } elseif ($this->filterType === 'next') {
            // Get next upcoming shift
            $this->shiftRecord = Shift::where('day', '>=', now())
                ->orderBy('day', 'asc')
                ->first();
            
            // If no upcoming shift, get the latest past shift
            if (!$this->shiftRecord) {
                $this->shiftRecord = Shift::where('day', '<', now())
                    ->orderBy('day', 'desc')
                    ->first();
            }
        } elseif ($this->filterType === 'previous') {
            // Get latest past shift
            $this->shiftRecord = Shift::where('day', '<', now())
                ->orderBy('day', 'desc')
                ->first();
        }
    }

    public function updatedFilterType(): void
    {
        $this->loadShiftRecord();
    }

    public function updatedSelectedDate(): void
    {
        if ($this->filterType === 'specific') {
            $this->loadShiftRecord();
        }
    }

    public function getShiftInfolistProperty(): Infolist
    {
        return $this->makeInfolist()
            ->record($this->shiftRecord)
            ->schema([
                Infolists\Components\Section::make('Jadwal Piket')
                    ->schema([
                        Infolists\Components\TextEntry::make('day')
                            ->label('Date & Time')
                            ->formatStateUsing(fn ($state) =>
    Carbon::parse($state)
        ->locale('id')
        ->translatedFormat('l, d F Y - H:i')
)

                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->color('primary')
                            ->icon('heroicon-o-calendar'),
                        
                        Infolists\Components\TextEntry::make('stiwed')
                            ->label('Stiwed')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('tray')
                            ->label('Tray')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('tong_sampah')
                            ->label('Tong Sampah')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('inventaris')
                            ->label('Inventaris')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('kain_lap_waiters')
                            ->label('Kain Lap Waiters')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('mushola')
                            ->label('Mushola')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('clear_up_pondok')
                            ->label('Clear Up Pondok')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('lap_piring_dapur')
                            ->label('Lap Piring Dapur')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('tas')
                            ->label('Tas')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('mematikan_lampu')
                            ->label('Mematikan Lampu')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-user'),
                        
                        Infolists\Components\TextEntry::make('pondok_a')
                            ->label('Pondok A')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-map-pin'),
                        
                        Infolists\Components\TextEntry::make('pondok_b')
                            ->label('Pondok B')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-map-pin'),
                        
                        Infolists\Components\TextEntry::make('pondok_c')
                            ->label('Pondok C')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-map-pin'),
                        
                        Infolists\Components\TextEntry::make('pondok_d')
                            ->label('Pondok D')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-map-pin'),
                        
                        Infolists\Components\TextEntry::make('bar')
                            ->label('Bar')
                            ->placeholder('Not assigned')
                            ->icon('heroicon-o-map-pin'),
                        
                        Infolists\Components\TextEntry::make('off')
                            ->label('Off ')
                            ->placeholder('None')
                            ->icon('heroicon-o-x-circle'),
                        
                        Infolists\Components\TextEntry::make('break_1')
                            ->label('Break 1(15:00-16:00)')
                            ->placeholder('None')
                            ->icon('heroicon-o-pause-circle'),
                        
                        Infolists\Components\TextEntry::make('break_2(16:00-17:00)')
                            ->label('Break 2')
                            ->placeholder('None')
                            ->icon('heroicon-o-pause-circle'),
                        
                        Infolists\Components\TextEntry::make('break_3(17:00-18:00)')
                            ->label('Break 3')
                            ->placeholder('None')
                            ->icon('heroicon-o-pause-circle'),
                    ])
                    ->columns(2),
            ]);
    }
}