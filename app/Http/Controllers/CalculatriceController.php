<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function index()
    {
        return view('calculator', [
            'result' => null,
            'num1' => null,
            'num2' => null,
            'operator' => null
        ]);
    }

    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');

        $pi = pi();

        if (!is_numeric($num1) || ($operator !== 'sqrt' && $operator !== 'square' && $operator !== 'sin' && $operator !== 'cos' && $operator !== 'tan' && $operator !== 'pi' && !is_numeric($num2))) {
            $result = 'Les valeurs doivent être numériques';
        } elseif ($operator === '/' && $num2 == 0) {
            $result = 'Erreur: Division par zéro';
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
                case 'sin':
                    $result = sin(deg2rad($num1));
                    break;
                case 'cos':
                    $result = cos(deg2rad($num1));
                    break;
                case 'tan':
                    $result = tan(deg2rad($num1));
                    break;
                case 'sqrt':
                    $result = $num1 < 0 ? 'Erreur: Racine carrée d\'un nombre négatif' : sqrt($num1);
                    break;
                case 'square':
                    $result = pow($num1, 2);
                    break;
                case 'pi':
                    $result = $pi;
                    break;
                default:
                    $result = 'Opérateur non valide';
                    break;
            }
        }

        return view('calculator', [
            'result' => $result,
            'num1' => $num1,
            'num2' => $num2,
            'operator' => $operator
        ]);
    }
}

