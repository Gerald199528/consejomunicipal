<?php

   namespace App\Http\Controllers;

   use App\Models\Model; // Asegúrate de usar el modelo correcto
   use Illuminate\Http\Request;

   class DataDownloadController extends Controller
   {
       public function downloadData(Request $request)
       {
           // Filtrado de datos según los parámetros que envíes desde el frontend
           $query = Model::query(); // Cambia 'Model' por el nombre de tu modelo

           if ($request->has('filtro')) {
               $query->where('campo', 'like', '%' . $request->input('filtro') . '%'); // Cambia 'campo' por el campo que desees filtrar
           }

           $data = $query->get();

           // Generar un archivo CSV
           $csvFileName = 'datos.csv';
           $handle = fopen('php://output', 'w');

           // Encabezados del CSV
           fputcsv($handle, ['Columna1', 'Columna2', 'Columna3']); // Cambia esto por los nombres de tus columnas

           // Escribir los datos en el CSV
           foreach ($data as $row) {
               fputcsv($handle, [$row->columna1, $row->columna2, $row->columna3]); // Cambia esto por los campos que necesites
           }

           fclose($handle);

           return response()->stream(function () use ($handle) {
               fclose($handle);
           }, 200, [
               'Content-Type' => 'text/csv',
               'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
           ]);
       }
   }