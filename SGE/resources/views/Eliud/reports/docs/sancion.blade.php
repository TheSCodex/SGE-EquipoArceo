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
            font-size: 11.5pt;
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
            font-size: 10.5pt;
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
    <div style="width:115%; position: relative; right:15; ">
        <img style=" width:100%; height: 110px" src="{{ public_path('img/Eliud/img_01.png') }}" alt="Logo UT" />
    </div>

    <div style="text-align: right; margin-top:10px; margin-bottom: 10px;">
        <p style="margin-bottom: 2px; margin-top:2px; "><span style=" font-weight: bold;">Asunto:</span>Sancion por
            incumplimiento.</p>
        <p style="margin-bottom: 2px; margin-top:2px; ">Cancún, Q.Roo; a {{ date('d') - 1 }} de {{ date('F') }} de
            {{ date('Y') }}
        </p>
    </div>
    <div style="font-weight:normal;margin-top:10px; margin-bottom: 35px;font-size: 12pt;">
        <p style="margin-bottom: 2px; margin-top:2px;text-decoration: underline; font-weight:bolder ">{{--<span style="text-decoration: underline; font-weight:bolder;">Nombre del (a) Estudiante</span>--}} {{$student?->name}} {{$student?->last_name}}</p>
        <p style="margin-bottom: 2px; margin-top:2px;text-decoration: underline; font-weight:bolder ">{{--<span style="text-decoration: underline; font-weight:bolder; ">Matricula</span> --}} {{$student?->identifier}}</p>
        <p style="margin-bottom: 2px; margin-top:2px;text-decoration: underline; font-weight:bolder ">{{--<span style="text-decoration: underline; font-weight:bolder;">Programa Educativo</span>--}} {{$career?->name}} </p>
    </div>

    <p style="width: 100%; text-align:justify; margin-top:20px; margin-top:10px; margin-bottom: 10px;line-height: none; font-size:10.5pt">
        Debido a que a la fecha no ha cumplido con la entrega de los avances de memoria y/o
        documentación para Gestión Empresarial, por este conducto le informo que de conformidad
        con el Procedimiento y el Reglamento de las Prácticas Profesionales se ha hecho acreedor a
        una sanción que consiste en:

    </p>


    <div style="position: relative; height:100px; width: 100%; display: flex; justify-content: center;">
        <div style="position:absolute; margin: 10px; left:50px">
            <table style="width: 70%; border-collapse: collapse; border: 0.5px solid black;">
               
                    <tr>
                        <th colspan="2" style="padding-left:10px; font-weight: normal; padding:3px; padding-bottom: 15px; text-align:left; border-bottom: 0.5px solid black;">
                            POR MOTIVOS ACADÉMICOS</th>
                    </tr>
                    <tr>
                        <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 1 ? $tipo == 1 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Amonestación
                            escrita</td>
                    </tr>
                    <tr>
                        <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 1 ? $tipo == 2 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Amonestación con
                            <em>*</em> <span style="text-decoration: underline"><span style="color:white">..</span>{{$interns[0]->service_hour ? $interns[0]->service_hour : '0'}}<span style="color:white">..</span></span> horas de labor social.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 1 ? $tipo == 3 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Cancelación de
                            Estadía.</td>
                    </tr>
            </table>
        </div>
        <div style="position:absolute; right:-95px; margin: 10px;">
            <table style="width: 75%; border-collapse: collapse; border: 0.5px solid black;">
                <thead>
                    <tr>
                        <th colspan="2" style="padding-left:8px;font-weight: normal; text-align:justify; border-bottom: 0.5px solid black;">
                            POR TEMAS RELACIONADOS EN<br /> GESTIÓN EMPRESARIAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width:34px  ; border: 0.5px solid black;">{{$motivo == 2 ? $tipo == 1 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Amonestación
                            escrita</td>
                    </tr>
                    <tr>
                        <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 2 ? $tipo == 2 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Amonestación con
                            <em>*</em> <span style="text-decoration: underline"><span style="color:white">..</span>{{ $interns[0]->service_hour ? $interns[0]->service_hour : '0'}}<span style="color:white">..</span></span> horas de labor social.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:34px; text-align: center; border:0.5px solid black;">{{$motivo == 2 ? $tipo == 3 ? 'X' : '' : '' }}</td>
                        <td style="padding: 2px;padding-bottom:5px; padding-left:8px; text-align: left; border-bottom: 0.5px solid black;">Cancelación de
                            Estadía.</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p style="margin-top: 200px; text-align:justifty;;line-height: none; font-size:10.5pt">Asimismo, y con el fin de evitar la cancelación del proceso, se le exhorta a
            cumplir dentro de
            los cinco días hábiles a partir de la recepción de la presente. </p>

        <p style=" margin-top:10px; margin-bottom: 10px; text-align:justifty;;line-height: none; font-size:10.5pt">Sin otro particular, quedo de usted para cualquier aclaración al respecto.
        
        </p>

        <div
            style="position: relative; height:100px; width: 100%; display: flex; justify-content: center; margin-top:20px; margin-bottom: 10px;">
            <div
                style="position:absolute;left:0px; margin: 10px; display:flex; align-items: center; justify-content: center; flex-direction: column;">
                <p style="text-align: center;font-weight:bolder">A T E N T A M E N T E</p>
                <p style="text-align: center; margin-top: 70px">________________________________</p>
                <p style="text-align: center; margin-top:10px">Nombre y firma del Asesor (a)
                    <br /> Académico (a)
                </p>
            </div>
            <div style="position:absolute; right :0px; margin: 10px;">
                <p style="text-align: center;font-weight:bolder;">ENTERADO</p>
                <p style="text-align: center; margin-top: 70px">________________________________</p>
                <p style="text-align: center; margin-top:10px"> Nombre y firma del (a) Estudiante </p>
            </div>
        </div>

        <p style="margin-top: 90px; text-align:justifty;;line-height: none; font-size:10.5pt"><span style="font-weight:bolder;">* Nota:</span> La sanción deberá ser entre 10 a 20 horas de labor social en la Dirección o
            departamento que
            correspondan las amonestaciones. </p>

        <div style=" margin-top:20px; margin-bottom: 10px;">
            <p style=" font-size: 12px; margin:0px; font-size:8pt">C.c.p. Dirección de División. </p>
            <p style=" font-size: 12px; margin:0px; font-size:8pt">C.c.p. Expediente del (a) estudiante. </p>

        </div>

        <div style="margin-top: 20px; padding-right: 40px; padding-left:50px">
            <table style="width: 100%; border-collapse: collapse; border: 0.5px solid black; font-size: 12px;">
                <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Fecha de Revisión: {{$docRevision->updated_at->format('j \d\e F \d\e\l Y')}}</td>
                <td style=" padding:2px; text-align: center; border: 0.5px solid black;">Revisión No. {{ $docRevision->revision_number }}</td>
                <td style=" padding:2px; text-align: center; border: 0.5px solid black;">{{ $docRevision->revision_id }}</td>

            </table>
        </div>

    </div>
</body>
</html>