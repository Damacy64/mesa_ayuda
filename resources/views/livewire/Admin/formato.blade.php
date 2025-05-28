<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resguardo de Bienes Informáticos</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 12px;
            padding: 0;
        }

        body {
            background: url('images/plantilla.png') no-repeat center center;
            background-size: cover;
            font-family: Arial, sans-serif;
            padding: 4.5cm 1.4cm;
            box-sizing: border-box;
        }

        .contenido {
            font-size: 11px;
            line-height: 1.4;
            text-align: justify;

        }


        .firmas {
            width: 100%;
            margin: 0 60px;


        }
    </style>
</head>

<body>

    <div class="contenido">
        <div style="text-align: right;">
            <strong>Agencia Federal de Aviación Civil</strong><br>
            Dirección de Recursos Materiales <br>
            <string style="font-size: 8.5px">Departamento de Soporte Técnico y Redes</string><br>
            <br>
            Ciudad de México, 21 de diciembre de 2024.
        </div>

        <h3 style="text-align: left; margin-top: 30px;">RESGUARDO DE BIENES INFORMÁTICOS</h3>

        <p>Por medio del presente, se hace constar que, con fecha señalada al rubro, el
            Departamento de Soporte Técnico y
            Redes de la Agencia Federal de Aviación Civil (AFAC), realizó la entrega del bien informático que a
            continuación
            se detalla:</p>

        <p style="padding-left: 100px">
            <strong>Tipo de Equipo:</strong>{{ $TipoDispositivo }} <br>
            <strong>Marca:</strong>{{ $marca }} <br>
            <strong>Modelo:</strong>{{ $modelo }} <br>
            <strong>N.° de Computador:</strong>{{ $numero_inventario }}<br>
            <strong>N.° de Serie:</strong>{{ $numero_serie }} <br>
            <strong>Procesador:</strong>{{ $procesador }} <br>
            <strong>Memoria RAM:</strong>{{ $RAM }} <br>
            <strong>Disco Duro:</strong>{{ $almacenamiento }}
        </p>

        <p>Cabe señalar que el usuario conoce y acepta que será responsable del resguardo y buen uso del bien
            informático descrito en el párrafo que antecede. </p>

        <table class="firmas">
            <tr>
                <td style="vertical-align: top; text-align:center;">
                    <p> <strong>Entrega:</strong> </p>
                    <p>
                        __________________________ <br>
                        Daniel Mitchel Ramírez Cartas<br>
                        Departamento de Soporte<br>
                        Técnico y Redes
                    </p>
                </td>

                <td style="vertical-align: top;">
                    <p style="padding-left: 180px;"><strong>Recibe:</strong> </p>
                    <p style="padding-left: 60px;">____________________________________<br>
                        Nombre: {{ $usuario }} {{ $apellido_p }} {{ $apellido_m }}<br>
                        Puesto: <br>
                        Región: <br>
                        Estado: <br>
                        Comandancia (código IATA):
                    </p>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <p style="text-align: center;  padding-left: 250px"><strong>Vo. Bo. TI de la
                            Unidad:</strong><br>
                        <br>____________________________<br>
                        Ing. Jesús Shiraky Beltrán Mora<br>
                        Director de Desarrollo Estrategico<br>
                    </p>
                </td>
            </tr>
        </table>
        <p>
            El bien informático se entrega completamente operativo (documentado), mismo que deberá ser montado y/o
            entregado
            debidamente identificado en el área de Soporte Técnico y Redes. En caso de falla, deberá informarse de
            inmediato
            al área correspondiente.
        </p>

        <h3>CARTA RESPONSIVA DE ACCESO Y USO DE SERVICIOS DE TECNOLOGÍAS DE INFORMACIÓN Y COMUNICACIONES DE LA AGENCIA
            FEDERAL DE AVIACIÓN CIVIL.</h3>

        <p>
            El usuario de servicios de tecnologías de información y comunicaciones, en lo sucesivo denominado “el
            usuario”,
            manifiesta que, con motivo de su empleo, cargo o comisión, tiene acceso y/o genera información clasificada
            como
            pública, reservada o confidencial, y en su caso se sirve de dispositivos, sistemas, aplicativos, registros,
            bases de datos u otros
            activos de Tecnologías de Información y Comunicaciones (TIC); tales como equipos de cómputo de escritorio y
            portátiles, tabletas,
            equipos de impresión y digitalización, equipos de entrada y salida de audio y video, proyectores, unidades
            de almacenamiento
            internas o externas; referidos de manera enunciativa más no limitativa, de la Agencia Federal de Aviación
            Civil (AFAC),
            ya sean propiedad de ésta o utilizados en su operación o desarrollo de las actividades que le corresponden.
        </p>

        <p>
            En razón de lo anterior, el usuario manifiesta que conoce el contenido y alcance de las disposiciones de la
            Ley Federal de Transparencia y Acceso a la Información Pública, la Ley General de Transparencia y Acceso a
            la
            Información Pública, la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados, la
            Ley
            Federal de Responsabilidades Administrativas de los Servidores Públicos, la Ley Federal de Archivos, la Ley
            de Seguridad Nacional,
            la Ley de Bienes Nacionales, la Ley Federal de los Trabajadores al Servicio del Estado, los Lineamientos
            Generales para la
            clasificación y desclasificación de la información así como para la elaboración de las versiones públicas;
            del mismo modo
            las correspondientes a los reglamentos, lineamientos, y demás disposiciones jurídicas correlativas a éstas
            leyes; asimismo,
            el usuario se hace sabedor(a) de las disposiciones enunciadas en las Directrices de Seguridad e Integridad
            de la Información de
            TIC de la AFAC.
        </p>

        <p><strong>A. DE LA SEGURIDAD, INTEGRIDAD y CONFIDENCIALIDAD DE LA INFORMACIÓN:</strong>
            En este tenor, el usuario se compromete a guardar con probidad y recato lo previsto en las disposiciones
            jurídicas de las materias que se mencionan en el presente documento, así como a evitar las siguientes
            acciones:
            eliminar, borrar, bloquear, inhabilitar, ocultar, o mover sin previo aviso la información perteneciente al
            ente público,
            sin importar la autoría de dicha información; a difundir o reproducir la información clasificada como
            reservada o confidencial
            en cualquier medio, ya sea físico, electrónico o digital; y en su caso, adoptar las medidas de seguridad
            necesarias para evitar
            que se difunda dicha información; la divulgación de información y documentación sobre procedimientos,
            métodos, fuentes, productos,
            medidas u operaciones, registros o información de inteligencia, especificaciones técnicas y de tecnología,
            misma a la que tiene
            acceso en el ejercicio de su empleo, cargo o comisión; salvo en los casos permitidos por las disposiciones
            que regulen la materia
            de que se trate; asumiendo en este acto la responsabilidad administrativa, civil o penal que pudiera
            derivarse del
            incumplimiento de lo anterior.
        </p>

        <p>
            En este mismo acto, bajo protesta de decir verdad, el usuario manifiesta que está consciente de que la
            eliminación, difusión
            o retención no autorizadas de información clasificada, o la negligencia en el manejo y custodia de ésta,
            pueden ocasionar un
            daño a la AFAC y/o a la Secretaría de Infraestructura, Comunicaciones y Transportes (SICT), así como a
            terceros. Por lo tanto,
            se compromete a no proporcionar dicha información, a menos que exista un mandato expreso y por escrito
            emitido por la autoridad competente.
        </p>

        <p>
            De esta manera, el usuario queda enterado que no posee ni poseerá derecho, interés o título alguno sobre la
            información que genera,
            tiene acceso o que tenga bajo su resguardo con motivo del desempeño de sus funciones, por lo que al momento
            de la conclusión de su
            empleo, cargo o comisión; así como en caso de que exista el mandato de una autoridad competente, deberá
            hacer entrega de la
            información a su jefe inmediato o bien, a quien el Titular del Área Normativa de adscripción designe para
            tales efectos; ya sea de
            manera impresa o en medios digitales, almacenada en el equipo de cómputo asignado, en el servicio en nube o
            en los dispositivos de
            almacenamiento externo/extraíble (que pueden ser propiedad de la SICT, de la AFAC, del usuario o un
            tercero), o cualquier otro
            medio o dispositivo en donde se haya almacenado la información en función de su naturaleza y medio de
            transmisión; sabido que de
            contravenir lo anterior, dicha conducta pudiera ser constitutiva de responsabilidad administrativa, civil o
            penal que determinen
            las instancias correspondientes.
        </p>

        <p>En ese orden de ideas, el Departamento de Soporte Técnico y Redes, realizará la liberación del resguardo de
            bienes informáticos
            por baja o cambio de empleo, cargo o comisión (referidas de manera enunciativa más no limitativa) previa
            notificación formal de
            la correcta entrega-recepción de la información correspondiente, por parte del jefe inmediato, o en su
            defecto a quien el Titular
            del Área Normativa de adscripción designe; para proceder a realizar las gestiones pertinentes al trámite de
            baja de cuentas y
            credenciales de acceso a servicios informáticos, aplicaciones, sistemas institucionales, correo electrónico
            y directorio activo
            según corresponda.
        </p>

        <p>
            De manera adicional, el usuario se hace conocedor que, bajo circunstancias de entrega de los bienes
            informáticos asignados a razón
            de baja por obsolescencia tecnológica, falla irreparable en algunos de sus componentes o reasignación del
            bien o liberación del
            resguardo de bienes informáticos, será responsable de realizar el respaldo de la información
            correspondiente, así como su entrega
            al jefe inmediato o titular de área, considerando las unidades de almacenamiento internas,
            externas/extraíbles o en el servicio
            en nube según corresponda, a efecto de que el Departamento de Soporte Técnico y Redes revise las condiciones
            del equipo y efectué
            las acciones pertinentes.
        </p>

        <p>
            Asimismo, se hace de conocimiento del usuario, que de conformidad con los Lineamientos Generales de
            Protección de Datos Personales
            para el Sector Público, y la Guía del Borrado Seguro emitida por el entonces Instituto Nacional de
            Transparencia, Acceso a la
            Información y Protección de Datos Personales (INAI), funciones que ahora han sido transferidas a la
            Secretaría Anticorrupción
            y Buen Gobierno, a través del organismo “Transparencia para el Pueblo”, conforme al decreto publicado el 21
            de marzo de 2025 en
            el Diario Oficial de la Federación (DOF); el Departamento de Soporte técnico y Redes realizará la supresión
            de la información
            contenida en los equipos de cómputo a través del Borrado Seguro de Datos, a fin de garantizar los atributos
            de Seguridad,
            Irreversibilidad y Confidencialidad, así como Responsabilidad con el Medio Ambiente, de tal manera que la
            probabilidad de
            recuperar o reutilizar los datos personales en posesión de los sujetos obligados, sea mínima.
        </p>

        <p>Por último, respecto al almacenamiento y respaldo periódico de la información en medios digitales, con base
            en las necesidades
            del servicio propios de cada área; se exhorta a los usuarios para priorizar el uso de los servicios en nube
            institucionales de
            la Agencia, con el objetivo de evitar daños y/o pérdida de datos ocasionada por los cierres inesperados de
            los servicios,
            procesos o aplicaciones que se ejecutan en los equipos de cómputo de escritorio y portátiles; así como
            garantizar que la información
            está segura. Lo anterior, en virtud de que los equipos antes referidos no disponen de las características
            técnicas mínimas para
            proteger, controlar el acceso, respaldar y evitar la pérdida de información, por lo que no está permitido
            utilizar los equipos de
            cómputo terminales, con funciones propias de servidores, en ninguna de sus modalidades.
        </p>

        <p><strong>B. DEL ACCESO A SISTEMAS INFORMÁTICOS Y USO DE SERVICIOS DE TECNOLOGÍAS
                DE LA INFORMACIÓN Y COMUNICACIONES (SERVICIOS DE TIC):</strong>
            Queda estrictamente prohibido, de manera enunciativa más no limitativa: divulgar, transferir, publicar,
            prestar o suplantar
            el usuario y contraseña o mecanismo de acceso a sistemas y servicios de TIC; no desempeñar las atribuciones,
            facultades o
            responsabilidades para cuyo objeto se creó el perfil de usuario por el cual tendrá acceso a sistemas y
            servicios de TIC; ejecutar,
            utilizar y/o reproducir parcial o totalmente cualquier software no autorizado, o bien, que no se haya
            obtenido o licenciado
            legalmente. De la misma forma, el usuario se obliga a lo siguiente:
        </p>

        <p>
            Notificar de manera inmediata al administrador del Sistema Informático o del servicio de TIC que
            corresponda,
            cuando al ingresar al sistema o hacer uso de dicho servicio, se percate de que las facultades, atribuciones,
            responsabilidades
            o permisos del perfil de usuario que le fue asignado, no atañan con las que fueron solicitadas, ya sea
            porque se encuentran
            limitadas o bien porque las excede, o en su caso, no competa a la capacitación que se le impartió para la
            operación del sistema
            o servicio de que se trate.
        </p>

        <p>
            Notificar de manera inmediata al administrador del Sistema Informático o de los Servicios de TIC, para que
            le sea revocado o
            modificado el acceso al sistema o el uso del servicio de TIC, cuando las causas por las cuales se le otorgó
            dicho acceso o uso
            del Servicio de TIC hayan cesado o se hayan modificado.
        </p>

        <p>
            Adoptar las medidas necesarias para evitar divulgar, transferir, publicar, prestar o suplantar su acceso a
            los Sistemas
            Informáticos y Servicios de TIC. En caso de incumplimiento de cualquiera de los supuestos establecidos en
            los párrafos anteriores,
            la UTIC podrá revocar el acceso a Sistemas y el uso de Servicios de TIC, sin menoscabo de las acciones o
            responsabilidad
            administrativa, civil, laboral o penal, a que dicho incumplimiento pueda dar lugar.
        </p>

        <p><strong>C. DEL INCUMPLIMIENTO Y LAS SANCIONES:</strong>
            Se deben evitar acciones de cualquier tipo en contra de la Carta Responsiva de Acceso y Uso de Servicios de
            Tecnologías de
            Información y Comunicaciones de la Agencia Federal de Aviación Civil, ya que en caso contrario se notificará
            al Órgano Interno
            de Control (OIC) mediante el reporte correspondiente, en donde se indique el funcionario y la violación en
            que se incurre,
            para que este OIC aplique las medidas/sanciones que juzgue necesarias en términos de las disposiciones de la
            normatividad en la
            materia, que comprende las siguientes sanciones: acta administrativa, inhabilitación (desde uno hasta veinte
            años) o destitución
            de la Administración Pública Federal, hasta lo dispuesto por la legislación penal, cuando se determine un
            carácter delictuoso.
            Dichas sanciones serán aplicadas aún en los casos en los que el servidor público deje el empleo, cargo o
            comisión, sin importar
            las razones que a ello motiven.
        </p>

        <p>
            Leída la presente Carta Responsiva de Acceso y Uso de Servicios de Tecnologías de Información y
            Comunicaciones de la Agencia
            Federal de Aviación Civil, el usuario manifiesta que comprende su contenido y alcance, por lo cual acepta de
            conformidad el mismo,
            para los efectos legales a que haya lugar; asimismo, manifiesta que, para la suscripción del mismo, no
            existió coacción física o
            moral y que es su voluntad hacerse sabedor de su contenido y alcance, y obligarse en los términos y
            condiciones que menciona.
        </p>
        <table style="padding-left: 200px; ">
            <tr>
                <td style="text-align: justify;">
                    <p>Firma de conformidad por parte del usuario de servicios <br>
                        TIC <br>
                        Usuario <br>
                        <br><strong>_____________________________________________ </strong><br>
                    </p>
                    <p> Nombre:{{ $usuario }} {{ $apellido_p }} {{ $apellido_m }}<br>
                        Puesto:<br>
                        No. de empleado: {{ $empleado_id }}<br>
                        Fecha(dd/mm/aaaa): {{ $fecha_asignacion }}<br>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
