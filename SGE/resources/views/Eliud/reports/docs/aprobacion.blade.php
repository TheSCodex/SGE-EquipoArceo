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
            font-size: 12pt;
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
            font-size: 11pt;
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
        <p id='Title' style="text-transform: uppercase; font-weight:bolder;text-align:center; font-size:12pt; margin-top:10px; marger: 10px;">
            DIRECCIÓN DE LA {{($division?->name)}}
        </p>
    </div>

    <div style="text-align: right; margin-top:20px; marger: 20px;">

        <p style="marger: 2px; margin-top:10px; font-size:12t; ">Cancún, Quintana Roo; a {{ date('d') - 1 }} de
            {{ date('F') }} de
            {{ date('Y') }}
        </p>
        <p style="marger: 2px; margin-top:30px; position: relative;right:25px "><span
                style=" font-weight: bold;">Asunto:
            </span>Autorización de digitalización.</p>

        <p style="marger: 2px; margin-top:2px; position:relative; right:125px"><span style=" font-weight: bold;">Of:
            </span> {{'UTC/' . $division-> initials .'/M-' . ($getNumber ? $getNumber : $interns[0]->foolscapNumber) . '/' . date('Y')  }}</p>
    </div>


    <p
        style="line-height: 25px ;width: 100%; text-align:justify;width:100%; margin-top:20px; margin-bottom:10px; marger: 10px;line-height: none; ">
        Se autoriza al (a) estudiante <span style="text-decoration: underline; font-weight:bolder;"><span style="color: white">..</span> {{$student?->name}} {{$student?->last_name}}<span style="color: white">..</span></span> del grupo <span style="text-decoration: underline"><span style="color: white">..</span> {{$group->name}}<span style="color: white">..</span></span> con
        número de matrícula:
        <span style="text-decoration: underline"><span style="color: white">..</span> {{$student?->identifier}}<span style="color: white">..</span></span> la digitalización de la MEMORIA en modalidad:
    </p>

    <div style="position: relative;height:1px">
        <div style="position: absolute; width: 250px; height:200px; top:50px; right:-5px">
            <p style="font-weight:bolder;"> {{ $project?->name}}</p>
        </div>
    
    </div>

    <div style="position:absolute; width:100% ; margin: 10px; left:95;">
        <table style="width: 75%; border-collapse: collapse; border: 0.5px solid black;">
            <tr>
                <td style="width:34px  ; border: 0.5px solid black;">{{$motivo == 1 ? 'X' : '' }}</td>
                <td
                    style="padding-left:8px;font-weight: normal; text-align:justify; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Tradicional</td>
                <td
                    style="padding-left:8px;font-weight: normal;width:50%; text-align:center; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Escribir el título</td>
            </tr>
            <tr>
                <td style="width:34px  ; border: 0.5px solid black;"></td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Excelencia académica
                </td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border-right: 0.5px solid black;">
                    
                </td>
            </tr>
            <tr>
                <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 2 ? 'X' : '' }}</td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Experiencia Laboral
                </td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border-right: 0.5px solid black;">
                </td>
            </tr>
            <tr>
                <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 3 ? 'X' : '' }}</td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Movilidad internacional
                </td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border-right: 0.5px solid black;">
                </td>
            </tr>
            <tr>
                <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 4 ? 'X' : '' }}</td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Proyecto de investigación
                </td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border-right: 0.5px solid black;">
                </td>
            </tr>
            <tr>
                <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 5 ? 'X' : '' }}</td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border: 0.5px solid black;font-weight: 700; padding-bottom: 15px;">
                    Certificación Profesional
                </td>
                <td
                    style="padding: 2px;paddier:5px; padding-left:8px; text-align: left; border-right: 0.5px solid black;">
                </td>
            </tr>
        </table>
    </div>

    <p style="margin-top: 250px; text-align:justifty;;line-height: none; font-size:12pt">
        Lo anterior para los trámites correspondientes a su titulación.

    </p>
    <div style="width:100%">
        <p style=" font-weight:bolder;text-align:center; font-size:12pt; margin-top:20px; marger: 10px;">
            Vo. Bo.
        </p>
    </div>


    <div
        style="position: relative; height:100px; width: 100%; display: flex; justify-content: center; margin-top:40px; marger: 10px;">
        <div
            style="position:absolute; width: 250px ;left:-20px; margin: 10px; display:flex; align-items: center; justify-content: center; flex-direction: column;">
            <p style="text-align: center; font-weight: 700;">ASESOR ACADÉMICO</p>
            <p style="text-align: center;font-weight:100 ; margin-top: 40px">____________________________________</p>
            <p style="text-align: center;font-size:12pt; ">{{$user->name}} {{$user->last_name}}
            </p>
        </div>
        <div style="position:absolute;  width: 250px ; right :-20px; margin: 10px;">
            <p style="text-align: center; font-weight: 700;">COMISIÓN ACADÉMICA</p>
            <p style="text-align: center; font-weight:100 ;margin-top: 40px">____________________________________</p>
            <p style="text-align: center; font-size:12pt;">{{ $director?->name . ' ' . $director?->last_name}} director(a) {{($division?->name)}} </br>
                Dirección</p>
        </div>
    </div>

    <div style="margin-top: 60px; width:100%; padding:50px; position: absolute; right:-75">
        <table style="width: 85%; border-collapse: collapse; border: 0.5px solid black; font-size: 12px;">
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Fecha de Revisión: {{$docRevision->updated_at->format('j \d\e F \d\e\l Y')}}</td>
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Revisión No. {{ $docRevision->revision_number }}</td>
            <td style=" padding:2px; text-align: center; border: 0.5px solid black;">{{ $docRevision->revision_id }}</td>

        </table>
    </div>

    </div>

    
</body>

</html>
