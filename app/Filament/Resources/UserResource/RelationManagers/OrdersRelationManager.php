<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Filament\Resources\OrderResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->label('Order ID')
                    ->sortable(),
                
                TextColumn::make('grand_total')
                    ->searchable()
                    ->sortable()
                    ->money('Kshs'),

                TextColumn::make('status')
                    ->badge()
                    ->sortable()
                    ->color(fn($state)=>match($state){
                        'new'=>'info',
                        'processing'=>'warning',
                        'shipped'=>'success',
                        'delivered'=>'success',
                        'canceled'=>'danger',
                    })
                    ->icon(fn($state)=>match($state){
                        'new'=>'heroicon-m-sparkles',
                        'processing'=>'heroicon-m-arrow-path',
                        'shipped'=>'heroicon-m-truck',
                        'delivered'=>'heroicon-m-check-badge',
                        'canceled'=>'heroicon-m-x-circle',
                    }),

                TextColumn::make('payment_method')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->searchable()
                    ->sortable()
                    ->badge(),

                TextColumn::make('created_at')
                    ->searchable()
                    ->sortable()
                    ->dateTime()
                    ->label('Order Date'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Action::make('view')
                    ->url(fn($record)=>OrderResource::getUrl('view',['view','record'=>$record]))
                        ->icon('heroicon-o-eye')
                        ->color('info'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
