<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatriceController extends Controller
{
    public function calculate(Request $request)
    {
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $operator = $request->input('operator');

        // Définir la valeur de Pi
        $pi = pi();

        // Vérifier si les valeurs sont des numéros
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
                    $result = sin(deg2rad($num1)); // On convertit en radians avant de calculer le sinus
                    break;
                case 'cos':
                    $result = cos(deg2rad($num1)); // On convertit en radians avant de calculer le cosinus
                    break;
                case 'tan':
                    $result = tan(deg2rad($num1)); // On convertit en radians avant de calculer la tangente
                    break;
                case 'sqrt':
                    // Racine carrée
                    if ($num1 < 0) {
                        $result = 'Erreur: Racine carrée d\'un nombre négatif';
                    } else {
                        $result = sqrt($num1); // Calcul de la racine carrée
                    }
                    break;
                case 'square':
                    // Carré
                    $result = pow($num1, 2); // Calcul du carré
                    break;
                case 'pi':
                    // Si l'opérateur est Pi, on retourne la valeur de Pi
                    $result = $pi;
                    break;
                default:
                    $result = 'Opérateur non valide';
                    break;
            }
        }

        return view('calculator', ['result' => $result, 'num1' => $num1, 'num2' => $num2, 'operator' => $operator]);
    }
}
