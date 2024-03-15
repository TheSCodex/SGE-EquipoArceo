<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="font-family: Arial; font: Arial ; padding: 10px;">
    <div style="width:100%">
        <img style=" width:100%;" src="{{ public_path('img/Eliud/img_01.png') }}" alt="Logo UT" />
    </div>
    <div style="text-align: right; margin-top:10px;">
        <p style="margin-bottom: 2px; margin-top:2px; "><span style=" font-weight: bold;">Asunto:</span>Sancion por
            incumplimiento.</p>
        <p style="margin-bottom: 2px; margin-top:2px; ">Cancún, Q.Roo; a {{ date('d') - 1 }} de {{ date('F') }} de
            {{ date('Y') }}
        </p>
    </div>
    <div style="font-weight:bolder; text-decoration: underline;">
        <p style="margin-bottom: 2px; margin-top:2px; ">Nombre del (a) Estudiante</p>
        <p style="margin-bottom: 2px; margin-top:2px; ">Matricula</p>
        <p style="margin-bottom: 2px; margin-top:2px; ">Programa Educativo</p>
    </div>

    <p style="width: 100%; margin-top:20px;">
        Debido a que a la fecha no ha cumplido con la entrega de los avances de memoria y/o
        documentación para Gestión Empresarial, por este conducto le informo que de conformidad
        con el Procedimiento y el Reglamento de las Prácticas Profesionales se ha hecho acreedor a
        una sanción que consiste en:

    </p>


    <div style="position: relative; height:100px; width: 100%; display: flex; justify-content: center;">
        <div style="position:absolute; margin: 10px;">
            <table style="width: 90%; border-collapse: collapse; border: 1px solid black; font-size: 12px;">
                <thead>
                    <tr>
                        <th colspan="2" style=" padding: 17px; text-align: center; border-bottom: 1px solid black;">
                            POR MOTIVOS ACADÉMICOS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Amonestación escrita</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Amonestación con
                            <em>*</em> ___ horas de labor social.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Cancelación de Estadía.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="position:absolute; right :-35px; margin: 10px;">
            <table style="width: 90%; border-collapse: collapse; border: 1px solid black; font-size: 12px;">
                <thead>
                    <tr>
                        <th colspan="2" style="padding: 10px; text-align: center; border-bottom: 1px solid black;">
                            POR TEMAS RELACIONADOS <br/> EN GESTIÓN EMPRESARIAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Amonestación escrita</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Amonestación con
                            <em>*</em> ___ horas de labor social.</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                        <td style="padding: 10px; text-align: center; border-bottom: 1px solid black;">Cancelación de Estadía.</td>
                    </tr>
                </tbody>
            </table>
    </div>
    
    <p style="margin-top: 200px;">Asimismo, y con el fin de evitar la cancelación del proceso, se le exhorta a cumplir dentro de 
    los cinco días hábiles a partir de la recepción de la presente. </p>
    
    <p>Sin otro particular, quedo de usted para cualquier aclaración al respecto. 
    </p>
    
    <div style="position: relative; height:100px; width: 100%; display: flex; justify-content: center;">
        <div style="position:absolute; margin: 10px; display:flex; align-items: center; justify-content: center; flex-direction: column;">
            <p style="text-align: center">A T E N T A M E N T E</p>
            <p style="text-align: center; margin-top: 40px">_____________________</p>
            <p style="text-align: center;">Nombre y firma del Asesor (a) 
                Académico (a) </p>
        </div>
        <div style="position:absolute; right :30px; margin: 10px;">
            <p style="text-align: center;">ENTERADO</p>
            <p style="text-align: center; margin-top: 40px">_____________________</p>
            <p style="text-align: center;"> Nombre y firma del (a) Estudiante </p>
        </div>
    </div>

    <p style="margin-top: 60px">* Nota: La sanción deberá ser entre 10 a 20 horas de labor social en la Dirección o departamento que 
        correspondan las amonestaciones. </p>

    <p style=" font-size: 12px; margin:0px">C.c.p. Dirección de División. </p>
    <p style=" font-size: 12px; margin:0px">C.c.p. Expediente del (a) estudiante. </p>

    <div style="margin-top: 40px; padding-right: 50px; padding-left:50px">
        <table style="width: 100%; border-collapse: collapse; border: 1px solid black; font-size: 12px;">
                <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>
                <td style="padding: 10px; text-align: center; border: 1px solid black;"></td>

        </table>
    </div>

</div>
</body>

</html>
