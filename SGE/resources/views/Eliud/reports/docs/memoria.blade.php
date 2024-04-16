<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p {
            mso-style-unhide: no;
            mso-style-qformat: yes;
            mso-style-next: Normal;
            margin: 0cm;
            mso-pagination: widow-orphan;
            page-break-after: avoid;
            mso-outline-level: 3;
            font-size: 14pt;
            mso-bidi-font-size: 10.0pt;
            font-family: "Arial", sans-serif;
            mso-bidi-font-family: "Times New Roman";
            mso-ansi-language: ES-TRAD;
            mso-fareast-language: ES;
            mso-bidi-font-weight: normal;
        }

        table {
            mso-style-unhide: no;
            mso-style-qformat: yes;
            mso-style-next: Normal;
            margin: 0cm;
            mso-pagination: widow-orphan;
            page-break-after: avoid;
            mso-outline-level: 3;
            font-size: 14pt;
            mso-bidi-font-size: 10.0pt;
            font-family: "Arial", sans-serif;
            mso-bidi-font-family: "Times New Roman";
            mso-ansi-language: ES-TRAD;
            mso-fareast-language: ES;
            mso-bidi-font-weight: normal;
        }
    </style>
</head>

<body style="font-family: Arial; font: Arial ; padding: 35px; padding-left: 45; padding-right: 40">
    <div style="width:115%; position: relative; right:30; ">
        <img style=" width:100%; height: 110px" src="{{ public_path('img/Eliud/img_01.png') }}" alt="Logo UT" />
    </div>

    <div style="width:100%">
        <p style=" font-weight:bolder;text-align:center; font-size:14pt; margin-top:20px; margin-bottom: 10px;">
            CARTA DE APROBACIÓN DE MEMORIA
        </p>
    </div>

    <div style="text-align: right; margin-top:20px; margin-bottom: 20px;">

        <p style="margin-bottom: 2px; margin-top:20px; font-size:14pt; ">Cancún, Quintana Roo; a {{ date('d') - 1 }} de
            {{ date('F') }} de
            {{ date('Y') }}
        </p>
    </div>
    <div style="font-weight:bolder; margin-top:10px; margin-bottom: 35px;font-size: 12pt;">
        <p style="margin-bottom: 2px; margin-top:2px; text-transform: uppercase;">{{$director?->name}} {{$director?->last_name}}</p>
        <p style="margin-bottom: 2px; margin-top:2px; text-transform: uppercase; ">DIRECTOR DE LA CARRERA DE </br> {{$division?->name}}
         </p>
        <p style="margin-bottom: 2px; margin-top:2px; ">P R E S E N T E</p>
    </div>
    <p
        style="width: 100%; text-align:justify; margin-top:20px; margin-top:10px; margin-bottom: 10px;line-height: none;">
        Sirva la presente para informarle que el (la) estudiante <span style="text-decoration: underline; font-weight:bolder;"><span style="color: white">..</span> {{$student?->name}} {{$student?->last_name}}<span style="color: white">..</span></span> ha concluido satisfactoriamente la elaboración de su memoria titulada
        <span style="text-decoration:underline;font-weight:bolder;"><span  style="color:white">...</span> {{ $project?->name}}<span style="color:white">...</span></span>
        que como requisito para la conclusión de su estadía y proceso de titulación establece la normatividad de la
        Universidad Tecnológica de Cancún.

        <br style="margin:30"></br>

        Así mismo, hago de su conocimiento que la memoria en mención cuenta con la correspondiente revisión y por
        consiguiente aprobación por quienes fungimos como asesores en el ámbito empresarial y académico.

        <br style="margin:30"></br>

        Sin otro particular al respecto, quedamos de usted.


    </p>



    <div
        style="position: relative; height:100px; width: 100%; display: flex; justify-content: center; margin-top:40px; margin-bottom: 10px;">
        <div
            style="position:absolute;left:-20px; margin: 10px; display:flex; align-items: center; justify-content: center; flex-direction: column;">
            <p style="text-align: center;">ASESOR EMPRESARIAL</p>
            <p style="text-align: center;font-weight:100 ; margin-top: 40px">________________________________</p>
            <p style="text-align: center;font-size:12pt; ">{{$business_advisors?->name}}
            </p>
        </div>
        <div style="position:absolute; right :-20px; margin: 10px;">
            <p style="text-align: center;">ASESOR ACADÉMICO</p>
            <p style="text-align: center; font-weight:100 ;margin-top: 40px">________________________________</p>
            <p style="text-align: center; font-size:12pt;">{{$user?->name}} {{$user?->last_name}}</p>
        </div>
    </div>

    <div style="margin-top: 30px; width:100%; padding:50px; position: relative; right:40">
        <table style="width: 100%; border-collapse: collapse; border: 0.5px solid black; font-size: 12px;">
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Fecha de Revisión: {{$docRevision->updated_at->format('j \d\e F \d\e\l Y')}}</td>
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Revisión No. {{ $docRevision->revision_number }}</td>
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">{{ $docRevision->revision_id }}</td>

        </table>
    </div>

    </div>
</body>

</html>
