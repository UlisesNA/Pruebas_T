<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FtpController extends Controller
{
    //
    public function index()
    {
        // establecer una conexión básica

        $conn_id = ftp_connect('127.0.0.1') or die("Could not connect");

        // iniciar una sesión con nombre de usuario y contraseña
        $login_result = ftp_login($conn_id, "admin", "");

        // verificar la conexión
        if ((!$conn_id) || (!$login_result)) {
            echo "¡La conexión FTP ha fallado!";
            echo "Se intentó conectar al 127.0.0.1 por el usuario Admin";
            exit;
        } else {
            echo "Conexión a 127.0.0.1 realizada con éxito, por el usuario Admin";
        }
        //$list=\FTP::connection('connection1')->getDirListing();
        //return view('ftp.index')->with(compact('list'));
        //Direccion local del archivo que queremos subir
       // $fileLocal = storage_path('app/prueba.txt');

        /*Direccion remota donde queremos subir el archivo
        En este caso seria a la raiz del servidor*/

//        $fileRemote = 'ftp/prueba.txt';

  //      $mode = 'FTP_BINARY';

        //Hacemos el upload
    //    \FTP::connection()->uploadFile($fileLocal,$fileRemote,$mode);

        //Detenemos la funcion con un mensajes
      //  return('Operación realizada con éxito');
    }
    public function upload(Request $request){
        dd($request->archivo);
        //Direccion local del archivo que queremos subir
        //$fileLocal = storage_path('app/indexFTP.html');

        /*Direccion remota donde queremos subir el archivo
        En este caso seria a la raiz del servidor*/
        $file = $request->file('archivo');
        $nombre = $file->getClientOriginalName();
        //dd($nombre);
        //$file->move(public_path().'/images/',$nombre);
        $fileRemote = '/ftp/'.$nombre;
//dd($fileRemote);
        $mode = 'FTP_BINARY';

        //Hacemos el upload
        \FTP::connection()->uploadFile($request->archivo,$fileRemote,$mode);

        //Detenemos la funcion con un mensajes
        return('Operación realizada con éxito');
    }
}
