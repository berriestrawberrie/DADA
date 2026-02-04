<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ceramic extends Model
{
    //MASS ASSIGNABLE COLUMNS
    protected $fillable = [
        'created_at',
        'accession',
        'status_code',
        'token',
        'updated_at',
        'collection',
        'start_date',
        'end_date',
        'collection_id',
        'entered_by',
        'artifact_id',
        'artifact_count',
        'material',
        'manufacturing_technique',
        'ware',
        'vessel_category',
        'form',
        'mended_form',
        'completeness',
        'paste_color',
        'exterior_surface',
        'exterior_color',
        'interior_surface',
        'interior_color',
        'oxidized_vs_reduced_fabric',
        'evidence_of_burning',
        'mended',
        'post_manufacturing_mod',
        'Added By',
        'changed_by',
        'change_date',
        'notes',
        'interior_exterior',
        'location',
        'decorative_technique',
        'decoration_color',
        'stylistic_element',
        'stylistic_element_number',
        'motif',
        'pattern_name',
        'pattern_notes',
        'pattern_reference',
        'genre',
        'base_mark',
        'base_mark_ref',
        'base_mark_color',
        'colonoware',
        'colono_rim_form',
        'colono_rim_angle',
        'max_rim_width',
        'colono_decoration_mode',
        'colono_base_form',
        'colono_footring_form',
        'non_plastic_paste_inclusions',
        'total_paste_inclusion_density',
        'wear_location',
        'ceramic_completeness',
        'wear_pattern',
        'sherd_thickness',
        'max_sherd_measurement',
        'sherd_weight',
        'mended_sherd_weight',
        'rim_length',
        'rim_diameter',
        'mended_rim_diameter',
        'base_length',
        'base_diameter',
        'mended_base_diameter',
        'has_photo',
        'photo'

    ];


    //ASSIGNED TABLE
    protected $table = 'ceramics_tables';
}
