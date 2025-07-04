<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si se llama "missions")
    protected $table = 'missions';

    // Campos que se pueden asignar de forma masiva
    protected $fillable = [
        'name',
        'rover_coor_x',
        'rover_coor_y',
        'rover_z',
    ];
}