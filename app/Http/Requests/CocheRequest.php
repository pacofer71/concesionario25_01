<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Rules\KilometrosRule;

class CocheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    //Si queremos manipular los datos nos crearemos el método siguiente
    public function prepareForValidation(){
        //Ponemos en mayúsculas modelo y color
        $this->merge([
            'modelo'=>ucwords($this->modelo),
            'color'=>ucwords($this->color)
        ]);
        //si marca_id==-1 ponemos marca_id a nulo
        if($this->marca_id==-1){
            $this->merge(['marca_id'=>null]);
        }
        // trataremos el fichero
        if(is_uploaded_file($this->foto)){
            $nombreF='img/coches'.uniqid()."_".$this->foto->getClientOriginalName();
            Storage::disk('public')->put($nombreF, File::get($this->foto));
            //me creo un campo nuevo en el request con el nombre del fichero
            $this->merge(['nombre_foto'=>"storage/$nombreF"]);

        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'modelo'=>['required'],
            'color'=>['required'],
            'foto'=>['nullable', 'image'],
            'nombre_foto'=>['nullable'],
            'kilometros'=>[new KilometrosRule()],
            'marca_id'=>['nullable']
        ];
    }
    //personalizaremos los mansajes de error
    public function messages(){
        return[
            'modelo.required'=>"El campo modelo es obligatorio",
            'color.required'=>"El cmpo color es obligatorio",
            'foto.image'=>"El fichero debe ser un fichero de imagen"
        ];
    }
}
