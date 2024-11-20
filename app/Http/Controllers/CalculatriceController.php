<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');

        // Vérifier si les valeurs sont des numéros
        if (!is_numeric($num1) || !is_numeric($num2)) {
            $result = 'Il faut taper que des réels';
        } elseif ($operator === '/' && $num2 == 0) {
            $result = 'Division par zéro => Erreur';
        } else {
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    $result = $num1 / $num2;
                    break;
                default:
                    $result = 'Opérateur non valide';
                    break;
            }
        }

        return view('calculator', ['result' => $result, 'num1' => $num1, 'num2' => $num2, 'operator' => $operator]);
    }
}
