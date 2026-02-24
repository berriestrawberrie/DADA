<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TobaccoPipe extends Model
{
    //
    protected $fillable = [
        'entered_by',
        'created_at',
        'accession',
        'status_code',
        'completeness',
        'artifact_count',
        'collection',
        'collection_id',
        'non_plastic_inclu',
        'material',
        'manufacturing_technique',
        'glaze_type',
        'paste_color',
        'bowl_base_type',
        'mouthpiece_form',
        'glaze_color',
        'maker',
        'post_manu_mod',
        'conservation',
        'mended',
        'manufact_location',
        'conserved',
        'motif_location',
        'decorative_motif',
        'mark_type',
        'motif_manu_method',
        'text_location',
        'text_frame_motif',
        'mark_notes',
        'slogan',
        'bowl_volume',
        'stem_length',
        'exterior_stem_diameter',
        'bore_diameter',
        '64_bore_diameter',
        'bowl_height',
        'max_bowl_diameter',
        'bowl_rim_diameter',
        'weight',
        'max_sherd',
        'has_photo',
        'photo',
        'isValid',
        'token',
        'start_date',
        'end_date',
        'Added By',

    ];

    protected $table = 'pipe_tables';
}
