<?php

namespace App\Http\Controllers;

use App\Library\ClassFactory as CF;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function query(Request $request, $model = null, $id = null, $added_by = null){

        if(isset($id)){
            $result = $this->update($model, $id, $added_by, $request->all());
            dd($result);

            if($result['status'] == 'success'){
                if($result['status'] == 'success'){
                    switch ($result['model']){
                        case "Book":
                            return redirect()->route('acq-list');
                        default:
                            return redirect()->route('index');

                    }
                } else {
                    return redirect()->route('index')
                        ->with('error', true)
                        ->with('result', $result);
                }

            }
        } else {
            dd("Hello");
        }
    }

    /**
     * General function to update
     * the model with id and who's the user with attributes
     * @param $model
     * Model name
     * @param $id
     * Id of the row to update
     * @param $added_by
     * ID of the user updated
     * @param $attr
     * Parameters to be updated
     * @return array
     * id,status,message,model,code
     */
    public function update($model, $id, $added_by, $attr): array{

        //Table/Model
        if(
            $model !== 'Book' and
            $model !== 'Circulation' and
            $model !== 'Forum' and
            $model !== 'Invoice' and
            $model !== 'User'
            //To add more here
        ){
            return json_encode("message: error on table/model name");
        }

        //ID
        $attr['id'] = $id;
        //Added by
        $attr['added_by'] = $added_by;

        return $result = CF::model($model)->saveData($attr);
    }

    public function insert($table, $att)
    {

        if (
            $table !== 'LabPC' and
            $table !== 'Log' and
            $table !== 'Student' and
            $table !== 'User'
        ) {
            return "Error on Table name: " . $table;
        }

        //set string as column values
        $attr = explode(',', $att);
        //replace %20 as spaces
        $attr = str_replace('%20', ' ', $attr);

        //at this point we have
        //table, attributes
        $result = CF::model($table)->saveData($attr);

        if ($result['status'] == 'success') {
            echo "<h1>Success!</h1><br/>";
            dd($result);
            //return json_encode("status: ok");
        } else {
            dd($result);
            //return json_encode($result);
        }
    }
}

