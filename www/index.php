<?php 
if(isset($_POST['submitted']) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    function sanitize_my_email($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    
    $to_email = 'info@andreabenzi.it';
    
    $subject = 'TEST: Richiesta';
    
    $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<html><body>';
    $message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $message .= "<tr><td><strong>Nome:</strong></td><td>" . strip_tags($_POST['nome']) . "</td></tr>";
    $message .= "<tr><td><strong>Cognome:</strong></td><td>" . strip_tags($_POST['cognome']) . "</td></tr>";
    $message .= "<tr><td><strong>Email:</strong></td><td>" . strip_tags($_POST['email']) . "</td></tr>";
    $message .= "<tr><td><strong>Telefono:</strong></td><td>" . strip_tags($_POST['telefono']) . "</td></tr>";
    $message .= "<tr><td><strong>Provincia:</strong></td><td>" . strip_tags($_POST['provincia']) . "</td></tr>";
    if (strip_tags($_POST['importo_altro']) != ""){
        $message .= "<tr><td><strong>Importo:</strong></td><td>" . strip_tags($_POST['importo_altro']) . "</td></tr>";
    }else{
        $message .= "<tr><td><strong>Importo:</strong></td><td>" . strip_tags($_POST['importo']) . "</td></tr>";
    }   
    $message .= "<tr><td><strong>Attività:</strong></td><td>" . strip_tags($_POST['attivita']) . "</td></tr>";
    $message .= "<tr><td><strong>Tipo Contratto:</strong></td><td>" . strip_tags($_POST['tipocontratto']) . "</td></tr>";
    $message .= "<tr><td><strong>Data assunzione:</strong></td><td>" . strip_tags($_POST['dataassunzione']) . "</td></tr>";
    $message .= "<tr><td><strong>Numero mensilità:</strong></td><td>" . strip_tags($_POST['nmensilita']) . "</td></tr>";
    $message .= "<tr><td><strong>Reddito mensile:</strong></td><td>" . strip_tags($_POST['redditomensile']) . "</td></tr>";

    $secure_check = sanitize_my_email($to_email);
    
    if ($secure_check == false) {
        ?>
        <script type="text/javascript">alert("Errore, email non valida.");</script>
        <?php
    }else{ 
        //send email 
        $success = mail($to_email, $subject, $message, $headers);
        if (!$success) {
            ?>
            <script type="text/javascript">alert("<?php $errorMessage = error_get_last()['message']; ?>");</script>
            <?php
        }else{
            ?>
            <script type="text/javascript">alert("MESSAGGIO INVIATO, GRAZIE.");</script>
            <?php 
        }
    }
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&amp;display=swap" type="text/css" media="all">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.2/compressed/themes/default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.2/compressed/themes/classic.date.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Test Landing</title>
</head>
<body>
    <!-- WRAP 2560px -->
    <div class="site-wrap">
        <!-- WRAP 1920px -->
        <div class="site-wrap__contents">
            
            <header id="header">    
                <div id="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <a href="" class="logo"><img src="images/logo.svg" alt="" /></a>
                            </div>
                            <div class="col-9">
                                <nav id="menu" class="navbar navbar-expand-lg navbar-light">
                                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">
                                          <li class="nav-item active">
                                            <a class="nav-link" href="#section1">Prestiti fai da te</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="#section2">Tasso fisso agevolato</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="#section3">Vantaggi</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="#section4">Fai da te!</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" href="#section5">FAQ</a>
                                          </li>
                                        </ul>
                                        <div class="numero-verde">
                                            <img src="images/phone-call.svg" class="phone-call" alt="" />
                                            <p>Numero Verde Gratuito<br/>
                                            <span>800 82 12 89</span><br/>
                                            lun - ven 9-13 / 14-18</p>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-8">
                                <div class="titolo">
                                    <mark>100% ONLINE.<br/>
                                    FACILE, VELOCE, DA CASA.</mark>
                                    <h1><span>RICHIEDERE UN PRESTITO</span> NON È MAI STATO COSÌ FACILE!</h1>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <!--FORM1-->
                                <div id="stepper1" class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <div class="step" data-target="#test1-l-1">
                                          <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test1-l-1">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Importo</span>
                                          </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <div class="step" data-target="#test1-l-2">
                                          <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test1-l-2">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Attività</span>
                                          </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <div class="step" data-target="#test1-l-3">
                                          <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test1-l-3">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Reddito</span>
                                          </button>
                                        </div>
                                        <div class="bs-stepper-line"></div>
                                        <div class="step" data-target="#test1-l-4">
                                          <button type="button" class="step-trigger" role="tab" id="stepper1trigger4" aria-controls="test1-l-4">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Esito</span>
                                          </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <form name="stepper1_form" action="index.php" onsubmit="return validateForm1();" method="post">

                                            <div id="test1-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                                                <h3>Che importo ti serve?</h3>
                                                <p>Ti informiamo che questa soluzione agevolata di prestito NON può essere concessa ai disoccupati e a coloro che percepiscono reddito di cittadinanza, pensione INAIL, pensione di INVALIDITÀ.</p>
                                                <p>Reddito minimo richiesto per accedere al finanziamento: 650 euro al mese.</p>
                                                <br/><br/>
                                                <div class="form-group">
                                                    <div class="campo50">
                                                        <input type="radio" name="importo" id="importo-1-form-multi-step" value="5000" checked="">
                                                        <label for="importo-1-form-multi-step">5.000€</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="importo" id="importo-2-form-multi-step" value="10000">
                                                        <label for="importo-2-form-multi-step">10.000€</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="importo" id="importo-3-form-multi-step" value="20000">
                                                        <label for="importo-3-form-multi-step">20.000€</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="importo" id="importo-4-form-multi-step" value="30000">
                                                        <label for="importo-4-form-multi-step">30.000€</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="importo" id="importo-5-form-multi-step" value="50000">
                                                        <label for="importo-5-form-multi-step">50.000€</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="text" name="importo_altro" placeholder="ALTRO" id="importo-form-multi-step">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-avanti" onclick="stepper1.next(); return false;">Avanti</button>
                                            </div>

                                            <div id="test1-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                                                <h3>Attività</h3>
                                                <div class="form-group">
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-1-form-multi-step" value="Pensionato Inps" checked="">
                                                        <label for="attivita-1-form-multi-step">Pensionato Inps</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-2-form-multi-step" value="Pensionato Altro Ente">
                                                        <label for="attivita-2-form-multi-step">Pensionato Altro Ente</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-3-form-multi-step" value="Dipendente NoiPa">
                                                        <label for="attivita-3-form-multi-step">Dipendente NoiPa</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-4-form-multi-step" value="Dipendente pubblico">
                                                        <label for="attivita-4-form-multi-step">Dipendente pubblico</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-5-form-multi-step" value="Dipendente statale / ministeriale">
                                                        <label for="attivita-5-form-multi-step">Dipendente statale / ministeriale</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-6-form-multi-step" value="Dipendente parastatale">
                                                        <label for="attivita-6-form-multi-step">Dipendente parastatale</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-7-form-multi-step" value="Dipendente postale">
                                                        <label for="attivita-7-form-multi-step">Dipendente postale</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-8-form-multi-step" value="Ferroviere">
                                                        <label for="attivita-8-form-multi-step">Ferroviere</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-9-form-multi-step" value="Azienda municipalizzata">
                                                        <label for="attivita-9-form-multi-step">Azienda municipalizzata</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-10-form-multi-step" value="Militare">
                                                        <label for="attivita-10-form-multi-step">Militare</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-11-form-multi-step" value="Dipendente Azienda privata">
                                                        <label for="attivita-11-form-multi-step">Dipendente Azienda privata</label>
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="radio" name="attivita" id="attivita-12-form-multi-step" value="Lavoratore autonomo">
                                                        <label for="attivita-12-form-multi-step">Lavoratore autonomo</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <button class="btn btn-primary btn-indietro btn-50" onclick="stepper1.previous(); return false;">Indietro</button>
                                                <button class="btn btn-primary btn-avanti btn-50" onclick="stepper1.next(); return false;">Avanti</button>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div id="test1-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger3">
                                                <h3>Maggiori informazioni</h3>
                                                <div class="form-group">
                                                    <div class="campo100">
                                                        <select id="contratto" name="tipocontratto">
                                                            <option value="">Tipo di Contratto *</option>
                                                            <option value="Determinato">Determinato</option>
                                                            <option value="Indeterminato">Indeterminato</option>
                                                        </select>
                                                    </div>
                                                    <div class="campo100">
                                                        <input type="text" class="form-control" name="dataassunzione" placeholder="Data di assunzione gg/mm/aaaa *" id="data-ass1" readonly="">
                                                    </div>
                                                    <div class="campo100">
                                                        <select id="mensilita" name="nmensilita">
                                                            <option value="">Numero mensilità</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>
                                                            <option value="14">14</option>
                                                            <option value="15">15</option>
                                                        </select>
                                                    </div>
                                                    <div class="campo100">
                                                        <select id="reddito" name="redditomensile">
                                                            <option value="">Reddito mensile netto</option>
                                                            <option value="sopra 650">sopra 650€</option>
                                                            <option value="sopra 1200">sopra 1200€</option>
                                                            <option value="sopra 1800">sopra 1800€</option>
                                                            <option value="sopra 2000">sopra 2000€</option>
                                                        </select>
                                                    </div>
                                                    <small>* non è richiesta la compilazione se sei un pensionato</small>
                                                </div>
                                                <button class="btn btn-primary btn-indietro btn-50" onclick="stepper1.previous(); return false;">Indietro</button>
                                                <button class="btn btn-primary btn-avanti btn-50" onclick="stepper1.next(); return false;">Avanti</button>
                                                <div class="clearfix"></div>
                                            </div>

                                            <div id="test1-l-4" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper1trigger4">
                                                <h3>Verifica la fattibilità</h3>
                                                <div class="form-group">
                                                    <div class="campo50">
                                                        <input type="text" name="nome" placeholder="Nome">
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="text" name="cognome" placeholder="Cognome">
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="email" name="email" placeholder="E-mail">
                                                    </div>
                                                    <div class="campo50">
                                                        <input type="text" name="telefono" placeholder="Telefono">
                                                    </div>
                                                    <div class="campo100">
                                                        <select id="provincia" name="provincia">
                                                            <option value="">Provincia</option><option value="AG">Agrigento</option><option value="AL">Alessandria</option><option value="AN">Ancona</option><option value="AO">Aosta</option><option value="AR">Arezzo</option><option value="AP">Ascoli Piceno</option><option value="AT">Asti</option><option value="AV">Avellino</option><option value="BA">Bari</option><option value="BT">Barletta-Andria-Trani</option><option value="BL">Belluno</option><option value="BN">Benevento</option><option value="BG">Bergamo</option><option value="BI">Biella</option><option value="BO">Bologna</option><option value="BZ">Bolzano</option><option value="BS">Brescia</option><option value="BR">Brindisi</option><option value="CA">Cagliari</option><option value="CL">Caltanissetta</option><option value="CB">Campobasso</option><option value="CI">Carbonia-Iglesias</option><option value="CE">Caserta</option><option value="CT">Catania</option><option value="CZ">Catanzaro</option><option value="CH">Chieti</option><option value="CO">Como</option><option value="CS">Cosenza</option><option value="CR">Cremona</option><option value="KR">Crotone</option><option value="CN">Cuneo</option><option value="EN">Enna</option><option value="FM">Fermo</option><option value="FE">Ferrara</option><option value="FI">Firenze</option><option value="FG">Foggia</option><option value="FC">Forlì-Cesena</option><option value="FR">Frosinone</option><option value="GE">Genova</option><option value="GO">Gorizia</option><option value="GR">Grosseto</option><option value="IM">Imperia</option><option value="IS">Isernia</option><option value="SP">La Spezia</option><option value="AQ">L'Aquila</option><option value="LT">Latina</option><option value="LE">Lecce</option><option value="LC">Lecco</option><option value="LI">Livorno</option><option value="LO">Lodi</option><option value="LU">Lucca</option><option value="MC">Macerata</option><option value="MN">Mantova</option><option value="MS">Massa-Carrara</option><option value="MT">Matera</option><option value="ME">Messina</option><option value="MI">Milano</option><option value="MO">Modena</option><option value="MB">Monza e della Brianza</option><option value="NA">Napoli</option><option value="NO">Novara</option><option value="NU">Nuoro</option><option value="OT">Olbia-Tempio</option><option value="OR">Oristano</option><option value="PD">Padova</option><option value="PA">Palermo</option><option value="PR">Parma</option><option value="PV">Pavia</option><option value="PG">Perugia</option><option value="PU">Pesaro e Urbino</option><option value="PE">Pescara</option><option value="PC">Piacenza</option><option value="PI">Pisa</option><option value="PT">Pistoia</option><option value="PN">Pordenone</option><option value="PZ">Potenza</option><option value="PO">Prato</option><option value="RG">Ragusa</option><option value="RA">Ravenna</option><option value="RC">Reggio Calabria</option><option value="RE">Reggio Emilia</option><option value="RI">Rieti</option><option value="RN">Rimini</option><option value="RM">Roma</option><option value="RO">Rovigo</option><option value="SA">Salerno</option><option value="VS">Medio Campidano</option><option value="SS">Sassari</option><option value="SV">Savona</option><option value="SI">Siena</option><option value="SR">Siracusa</option><option value="SO">Sondrio</option><option value="TA">Taranto</option><option value="TE">Teramo</option><option value="TR">Terni</option><option value="TO">Torino</option><option value="OG">Ogliastra</option><option value="TP">Trapani</option><option value="TN">Trento</option><option value="TV">Treviso</option><option value="TS">Trieste</option><option value="UD">Udine</option><option value="VA">Varese</option><option value="VE">Venezia</option><option value="VB">Verbano-Cusio-Ossola</option><option value="VC">Vercelli</option><option value="VR">Verona</option><option value="VV">Vibo Valentia</option><option value="VI">Vicenza</option><option value="VT">Viterbo</option>
                                                        </select>
                                                    </div>
                                                    <div class="campo100">
                                                        <input type="checkbox" name="campo-gdpr" id="campo-gdpr-form-multi-step" value="1">
                                                        <label for="campo-gdpr-form-multi-step">L'Utente dichiara di aver preso visione dell' informativa resa da parte di Gruppo Santamaria S.p.a ai sensi degli articoli 13 e 14 del Regolamento generale UE sulla protezione dei dati GDPR e scaricabile dal presente sito nella sezione <a target="_blank" style="text-decoration: underline;" href="#">Privacy</a>.</label>
                                                    </div>
                                                    <div class="campo100">
                                                        <input type="checkbox" name="campo-privacy" id="campo-privacy-form-multi-step" value="2">
                                                        <label for="campo-privacy-form-multi-step">L'Utente presta il proprio libero ed esplicito consenso per il trattamento di cui all'informativa (dati forniti volontariamente dall'utente).</label>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-indietro btn-50" onclick="stepper1.previous(); return false;">Indietro</button>
                                                <input type="hidden" name="submitted" value="richiesta" />
                                                <button type="submit" class="btn btn-primary btn-conferma btn-50">Conferma</button>
                                                <div class="clearfix"></div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-- -->
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section id="section1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#section1_prestiti" role="tab">Prestiti personali</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#section1_cessione" role="tab">Cessione del quinto</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="section1_prestiti" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7">
                                            <h2>Conveniente, veloce e riservato.</h2>
                                            <p>I Prestiti Fai da Te sono una tipologia di prestito che si contraddistingue per la convenienza, la facilità e la velocità di erogazione.</p>
                                            <p><b>Puoi ottenere l’importo richiesto in sole 24 ore</b> dalla data di approvazione. Con la massima riservatezza: non hai bisogno di specificare la motivazione della tua richiesta.</p>
                                            <p>E se sei un pensionato, <b>solo noi ti finanziamo fino a 89 anni, con rate da 24 a 84 mesi.</b></p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <img src="images/prestiti-personali.jpg" alt="" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7">
                                            <h3>Cosa puoi fare con i Prestiti Fai da Te?</h3>
                                            <ul>
                                                <li>Acquistare o ristrutturare la casa dei tuoi sogni</li>
                                                <li>Realizzare il tuo matrimonio da favola</li>
                                                <li>Coprire le tue spese mediche, legali o condominiali</li>
                                                <li>Garantire gli studi e il futuro della tua famiglia</li>
                                                <li>Organizzare la tua vacanza ideale</li>
                                            </ul>
                                            <p><b>Componi tu stesso il prestito più adatto alle tue esigenze!</b></p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <h3>Chi può richiedere i Prestiti Personali?</h3>
                                            <ul>
                                                <li>Tutti i residenti in Italia</li>
                                                <li>Pensionati fino a 89 anni a scadenza del piano</li>
                                                <li>Tutti i dipendenti pubblici, privati e statali</li>
                                                <li>Lavoratori autonomi</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="section1_cessione" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7">
                                            <h2>Comodo, Conveniente e Senza Pensieri.</h2>
                                            <p>La Cessione del Quinto è un prestito a tasso agevolato costante pensato per dipendenti pubblici, dipendenti statali e pensionati.</p>
                                            <p>Sicura e trasparente: hai copertura assicurativa e sei sempre tutelato perchè la rata mensile non può superare 1/5 dello stipendio o della pensione.</p> 
                                            <p>Garantisce per te il tuo datore di lavoro e questo ti permette di ottenere fino a 75.000€ senza ulteriori garanzie.</p>
                                            <p>E se sei un pensionato solo noi ti finanziamo fino a 89 anni.</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <img src="images/cessione-del-quinto.jpg" alt="" class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7">
                                            <h3>Perché scegliere la nostra Cessione del Quinto</h3>
                                            <ul>
                                                <li>Veloce. Hai l'esito del tuo preventivo in 1h.</li>
                                                <li>Semplice. La pratica è snella, a firma singola e anche a domicilio.</li>
                                                <li>Garanzie. Ti basta presentare la busta paga o il cedolino della pensione.</li>
                                                <li>Ti offre un tasso agevolato del 3,72%*.</li>
                                                <li>Trasparente.</li>
                                                <li>Puoi ottenere fino a 75.000€ con rate da 24 a 120 mesi.</li>
                                            </ul>
                                            <p><b>Scegli l'importo che ti serve e spendi in libertà senza pensare alle rate!</b></p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5">
                                            <h3>Chi può richiedere i Prestiti Personali?</h3>
                                            <ul>
                                                <li><i>Tutti i residenti in Italia</i></li>
                                                <li><i>Pensionati fino a 89 anni a scadenza del piano</i></li>
                                                <li><i>Tutti i dipendenti pubblici e statali a tempo indeterminato.</i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="" class="btn custom-btn">Richiedi il tuo prestito</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">TASSO FISSO AGEVOLATO</h2>
                            <h3 class="text-center">Per tutti i dipendenti della Pubblica Amministrazione</h3>
                        </div>
                    </div>
                </div>
                <div class="sfondo-grigio">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="featured-box">
                                    <a href="#">
                                        <img src="images/dipendente_ente_locale.jpg" alt="" />
                                    </a>
                                </div>
                                <a href="#" class="featured-title">DIPENDENTI ENTI LOCALI</a>
                                <p>Tutti i dipendenti pubblici o parapubblici hanno la possibilità di accedere a condizioni di finanziamento agevolate. Senza bisogno di fornire garanzie perché la busta paga da sola assicura l’accesso diretto ai tassi dedicati.</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="featured-box">
                                    <a href="#">
                                        <img src="images/insegnanti.jpg" alt="" />
                                    </a>
                                </div>
                                <a href="#" class="featured-title">INSEGNANTI</a>
                                <p>Abbiamo concretizzato un prestito su misura per tutti i dipendenti statali. Oltre ai tassi agevolati, offriamo la possibilità di ottenere il prestito in tempi rapidi, con la massima comodità e trasparenza delle condizioni.</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4">
                                <div class="featured-box">
                                    <a href="#">
                                        <img src="images/forze_ordine.jpg" alt="" />
                                    </a>
                                </div>
                                <a href="#" class="featured-title">FORZE DELL'ORDINE</a>
                                <p>Offriamo agevolazioni riservate ai dipendenti delle forze armate o delle forze dell’ordine. Con la cessione del quinto sarà possibile ottenere fino a 75.000€ con un tasso di interesse fisso e agevolato. In tempi rapidi e in totale sicurezza.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="" class="btn custom-btn">Richiedi il tuo prestito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">I VANTAGGI DI PRESTITI FAI DA TE</h2>
                            <h3 class="text-center"><b>Prestiti Fai da Te</b> annulla i costi di gestione <br/>e questo ti permette di accedere ai prestiti a un <b>tasso agevolato del 3,72%*</b>.</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-euro.svg" alt="" />
                                </div>
                                <h4 class="text-center">CONVENIENZA</h4>
                                <p>con la formula fai da te risparmi, perché ottimizzi le operazioni delle procedure operative.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-rocket.svg" alt="" />
                                </div>
                                <h4 class="text-center">TEMPESTIVITÀ</h4>
                                <p>garantiamo l’esito in un’ora per la tua richiesta personalizzata e hai supporto continuo per le tue necessità.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-handshake.svg" alt="" />
                                </div>
                                <h4 class="text-center">COMODITÀ</h4>
                                <p>bastano i tuoi dati e la tua busta paga per erogarti l’importo che ti serve, qualunque sia la sua destinazione.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-bulb.svg" alt="" />
                                </div>
                                <h4 class="text-center">TASSO</h4>
                                <p>TAEG 3,72%*, un piccolo tasso per grandi progetti.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-shield.svg" alt="" />
                                </div>
                                <h4 class="text-center">PRIVACY</h4>
                                <p>non chiediamo giustificativi di spese o motivazioni di prestito.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <div class="icon-box">
                                <div class="image">
                                    <img src="images/vant-team.svg" alt="" />
                                </div>
                                <h4 class="text-center">AFFIDABILITÀ</h4>
                                <p>siamo consulenti esperti del credito da oltre 10 anni.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="" class="btn custom-btn btn-yellow">Richiedi il tuo prestito</a>
                        </div>
                    </div>
                </div>
                <div class="banda-chiamaci-subito">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-7 sinistra">
                                <h4 class="text-center">CHIAMACI SUBITO!</h4>
                                <p class="text-center">Mettiti in contatto diretto con noi <br/>per qualsiasi domanda, dubbio a chiarimento.</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-5 destra">
                                <img src="images/phone-call2.svg" alt="" />
                                <p class="numero-verde">Numero Verde Gratuito<br/>
                                <span>800 82 12 89</span><br/>
                                dal lunedì al venerdì 9-13/14-18</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">IL MODO PIÙ VELOCE PER OTTENERE IL TUO PRESTITO!</h2>
                            <h3 class="text-center">Dopo aver compilato il form completa la procedura seguendo questi semplici step:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="draw-box">
                                <div class="image">
                                    <img src="images/identity_card.svg" alt="" class="img-fluid" />
                                </div>
                                <h4 class="text-center">1. Fai una foto al tuo documento di identità e alla tua busta paga (o al tuo cedolino)</h4>
                                <p class="text-center">assicurati che sia tutto leggibile</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="draw-box">
                                <div class="image">
                                    <img src="images/whatsapp.svg" alt="" class="img-fluid" />
                                </div>
                                <h4 class="text-center">2. Inviaci le foto su WhatsApp</h4>
                                <p class="text-center">assicurati che sia tutto leggibile</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="draw-box">
                                <div class="image">
                                    <img src="images/risposta.svg" alt="" class="img-fluid" />
                                </div>
                                <h4 class="text-center">3. Un nostro operatore ti chiamerà su Hangouts</h4>
                                <p class="text-center">Preparati scaricando l'app gratuita di Google</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3">
                            <div class="draw-box">
                                <div class="image">
                                    <img src="images/portfolio.svg" alt="" class="img-fluid" />
                                </div>
                                <h4 class="text-center">4. Ricevi il tuo Prestito Fai da Te</h4>
                                <p class="text-center">semplice, veloce e conveniente</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="" class="btn custom-btn btn-yellow">Richiedi il tuo prestito</a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">PRESTITI PERSONALI E CESSIONE DEL QUINTO: FAQ</h2>
                            <h3 class="text-center">Leggi le risposte alle domande più frequenti</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="carosello-faq" class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Quali documenti occorre presentare per la Cessione del Quinto?</p>
                                            <p class="descrizione">Dipendenti: certificato di stipendio sottoscritto dall’amministrazione, ultima busta paga, ultimo CUD. Pensionati: certificato di quota cedibile sottoscritta dall’Ente Previdenziale, ultimo cedolino, ultimo CUD. Per entrambi: documento d’identità e tessera sanitaria.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Quanto tempo è necessario per ottenere la cessione del quinto?</p>
                                            <p class="descrizione">All’atto dell’istruzione della pratica, dopo aver ricevuto il benestare da parte dell’Amministrazione di appartenenza, si eroga il finanziamento entro 10 giorni lavorativi.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Quali sono i costi da sostenere per accedere al prestito?</p>
                                            <p class="descrizione">Commissioni ed interessi bancari, costi di istruttoria e di intermediazione, rimborso spese notifica e postali, polizza assicurativa contro il rischio della perdita del posto di lavoro e contro la perdita della vita.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Come avviene il rimborso del finanziamento?</p>
                                            <p class="descrizione">Il rimborso avviene tramite rate mensili costanti versate alla società finanziaria, trattenute dall’amministrazione di appartenenza direttamente dalla busta paga o cedolino pensione.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">È possibile saldare il debito anticipatamente?</p>
                                            <p class="descrizione">Sì, è possibile saldare il debito anticipatamente e beneficiare del recupero con abbuono degli interessi non maturati.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Perché bisogna sottoscrivere una polizza assicurativa?</p>
                                            <p class="descrizione">La polizza assicurativa è prevista dalla legge che disciplina questa forma di finanziamento (Legge 180/50 e Legge 14 maggio 2005, n. 80).</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">La rata e il tasso di interesse rimangono invariati per tutto il periodo del finanziamento?</p>
                                            <p class="descrizione">Sì, la rata è fissa per tutta la durata del finanziamento che può essere da 24 a 120 mesi e il tasso rimane fisso per tutto il periodo di ammortamento del prestito.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Cosa succede se si ha già una cessione del quinto in corso?</p>
                                            <p class="descrizione">La cessione in corso deve essere obbligatoriamente estinta. Il residuo debito viene detratto dal netto ricavo della nuova operazione e versato a favore dell’ente titolare del precedente prestito per la sua estinzione.</p>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <p class="titolo">Qual è la differenza tra cessione del quinto e il classico prestito bancario?</p>
                                            <p class="descrizione">Per la cessione del quinto non sono richieste garanzie. Basta avere un rapporto di lavoro a tempo indeterminato presso aziende solide e affidabili o una pensione. Eventuali disguidi finanziari a carico non impediscono il perfezionamento del finanziamento.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="section6">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 bg-yellow">
                            <h5>Siamo il primo Intermediario del Credito in Italia a promuovere un’importante “alleanza con i consumatori” sottoscrivendo la “Carta dei Servizi”  promossa dal Centro Studi Codacons.</h5>
                            <p>Il Gruppo Santamaria S.p.A. è un Intermediario del Credito iscritto regolarmente nell’Elenco Agenti in attività Finanziaria tenuto dall’Organismo di Vigilanza (OAM) con il n. A107. Vantiamo la fiducia di oltre 20.000 clienti ai quali offriamo consulenza e servizi attraverso una struttura che si compone da: filiali bancarie, consulenti esterni, network di portali specializzati online.</p>
                            <p>La nostra sede è a Catania, ma puoi trovarci in tutte le filiali del Gruppo Credem presenti in Sicilia oppure chiamando il nostro servizio clienti al numero verde 800821289 o via e-mail all’indirizzo servizioclienti@prestitifaidate.it</p>
                            <a href="" class="btn custom-btn">Richiedi il tuo prestito</a>
                            <img src="images/Group-14.svg" alt="" class="certificato" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 bg-office">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </section>

            <section id="section7">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-8">
                            <div class="titolo">
                                <mark>100% ONLINE.<br/>
                                FACILE, VELOCE, DA CASA.</mark>
                                <h2><span>RICHIEDERE UN PRESTITO</span> NON È MAI STATO COSÌ FACILE!</h2>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <!--FORM2-->
                            <div id="stepper2" class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test2-l-1">
                                      <button type="button" class="step-trigger" role="tab" id="stepper2trigger1" aria-controls="test2-l-1">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Importo</span>
                                      </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test2-l-2">
                                      <button type="button" class="step-trigger" role="tab" id="stepper2trigger2" aria-controls="test2-l-2">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Attività</span>
                                      </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test2-l-3">
                                      <button type="button" class="step-trigger" role="tab" id="stepper2trigger3" aria-controls="test2-l-3">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Reddito</span>
                                      </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test2-l-4">
                                      <button type="button" class="step-trigger" role="tab" id="stepper2trigger4" aria-controls="test2-l-4">
                                        <span class="bs-stepper-circle">4</span>
                                        <span class="bs-stepper-label">Esito</span>
                                      </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <form name="stepper2_form" action="index.php" onsubmit="return validateForm2();" method="post">

                                        <div id="test2-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger1">
                                            <h3>Che importo ti serve?</h3>
                                            <p>Ti informiamo che questa soluzione agevolata di prestito NON può essere concessa ai disoccupati e a coloro che percepiscono reddito di cittadinanza, pensione INAIL, pensione di INVALIDITÀ.</p>
                                            <p>Reddito minimo richiesto per accedere al finanziamento: 650 euro al mese.</p>
                                            <br/><br/>
                                            <div class="form-group">
                                                <div class="campo50">
                                                    <input type="radio" name="importo" id="importo2-1-form-multi-step" value="5000" checked="">
                                                    <label for="importo2-1-form-multi-step">5.000€</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="importo" id="importo2-2-form-multi-step" value="10000">
                                                    <label for="importo2-2-form-multi-step">10.000€</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="importo" id="importo2-3-form-multi-step" value="20000">
                                                    <label for="importo2-3-form-multi-step">20.000€</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="importo" id="importo2-4-form-multi-step" value="30000">
                                                    <label for="importo2-4-form-multi-step">30.000€</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="importo" id="importo2-5-form-multi-step" value="50000">
                                                    <label for="importo2-5-form-multi-step">50.000€</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="text" name="importo_altro" placeholder="ALTRO" id="importo2-form-multi-step">
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-avanti" onclick="stepper2.next(); return false;">Avanti</button>
                                        </div>

                                        <div id="test2-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper2trigger2">
                                            <h3>Attività</h3>
                                            <div class="form-group">
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-1-form-multi-step" value="Pensionato Inps" checked="">
                                                    <label for="attivita2-1-form-multi-step">Pensionato Inps</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-2-form-multi-step" value="Pensionato Altro Ente">
                                                    <label for="attivita2-2-form-multi-step">Pensionato Altro Ente</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-3-form-multi-step" value="Dipendente NoiPa">
                                                    <label for="attivita2-3-form-multi-step">Dipendente NoiPa</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-4-form-multi-step" value="Dipendente pubblico">
                                                    <label for="attivita2-4-form-multi-step">Dipendente pubblico</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-5-form-multi-step" value="Dipendente statale / ministeriale">
                                                    <label for="attivita2-5-form-multi-step">Dipendente statale / ministeriale</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-6-form-multi-step" value="Dipendente parastatale">
                                                    <label for="attivita2-6-form-multi-step">Dipendente parastatale</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-7-form-multi-step" value="Dipendente postale">
                                                    <label for="attivita2-7-form-multi-step">Dipendente postale</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-8-form-multi-step" value="Ferroviere">
                                                    <label for="attivita2-8-form-multi-step">Ferroviere</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-9-form-multi-step" value="Azienda municipalizzata">
                                                    <label for="attivita2-9-form-multi-step">Azienda municipalizzata</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-10-form-multi-step" value="Militare">
                                                    <label for="attivita2-10-form-multi-step">Militare</label>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-11-form-multi-step" value="Dipendente Azienda privata">
                                                    <label for="attivita2-11-form-multi-step">Dipendente Azienda privata</label>
                                                </div>
                                                <div class="campo50">
                                                    <input type="radio" name="attivita" id="attivita2-12-form-multi-step" value="Lavoratore autonomo">
                                                    <label for="attivita2-12-form-multi-step">Lavoratore autonomo</label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <button class="btn btn-primary btn-indietro btn-50" onclick="stepper2.previous(); return false;">Indietro</button>
                                            <button class="btn btn-primary btn-avanti btn-50" onclick="stepper2.next(); return false;">Avanti</button>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div id="test2-l-3" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper2trigger3">
                                            <h3>Maggiori informazioni</h3>
                                            <div class="form-group">
                                                <div class="campo100">
                                                    <select id="contratto2" name="tipocontratto">
                                                        <option value="">Tipo di Contratto *</option>
                                                        <option value="Determinato">Determinato</option>
                                                        <option value="Indeterminato">Indeterminato</option>
                                                    </select>
                                                </div>
                                                <div class="campo100">
                                                    <input type="text" class="form-control" name="dataassunzione" placeholder="Data di assunzione gg/mm/aaaa *" id="data-ass2" readonly="">
                                                </div>
                                                <div class="campo100">
                                                    <select id="mensilita2" name="nmensilita">
                                                        <option value="">Numero mensilità</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                    </select>
                                                </div>
                                                <div class="campo100">
                                                    <select id="reddito2" name="redditomensile">
                                                        <option value="">Reddito mensile netto</option>
                                                        <option value="sopra 650">sopra 650€</option>
                                                        <option value="sopra 1200">sopra 1200€</option>
                                                        <option value="sopra 1800">sopra 1800€</option>
                                                        <option value="sopra 2000">sopra 2000€</option>
                                                    </select>
                                                </div>
                                                <small>* non è richiesta la compilazione se sei un pensionato</small>
                                            </div>
                                            <button class="btn btn-primary btn-indietro btn-50" onclick="stepper2.previous(); return false;">Indietro</button>
                                            <button class="btn btn-primary btn-avanti btn-50" onclick="stepper2.next(); return false;">Avanti</button>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div id="test2-l-4" role="tabpanel" class="bs-stepper-pane text-center" aria-labelledby="stepper2trigger4">
                                            <h3>Verifica la fattibilità</h3>
                                            <div class="form-group">
                                                <div class="campo50">
                                                    <input type="text" name="nome" placeholder="Nome">
                                                </div>
                                                <div class="campo50">
                                                    <input type="text" name="cognome" placeholder="Cognome">
                                                </div>
                                                <div class="campo50">
                                                    <input type="email" name="email" placeholder="E-mail">
                                                </div>
                                                <div class="campo50">
                                                    <input type="text" name="telefono" placeholder="Telefono">
                                                </div>
                                                <div class="campo100">
                                                    <select id="provincia2" name="provincia">
                                                        <option value="">Provincia</option><option value="AG">Agrigento</option><option value="AL">Alessandria</option><option value="AN">Ancona</option><option value="AO">Aosta</option><option value="AR">Arezzo</option><option value="AP">Ascoli Piceno</option><option value="AT">Asti</option><option value="AV">Avellino</option><option value="BA">Bari</option><option value="BT">Barletta-Andria-Trani</option><option value="BL">Belluno</option><option value="BN">Benevento</option><option value="BG">Bergamo</option><option value="BI">Biella</option><option value="BO">Bologna</option><option value="BZ">Bolzano</option><option value="BS">Brescia</option><option value="BR">Brindisi</option><option value="CA">Cagliari</option><option value="CL">Caltanissetta</option><option value="CB">Campobasso</option><option value="CI">Carbonia-Iglesias</option><option value="CE">Caserta</option><option value="CT">Catania</option><option value="CZ">Catanzaro</option><option value="CH">Chieti</option><option value="CO">Como</option><option value="CS">Cosenza</option><option value="CR">Cremona</option><option value="KR">Crotone</option><option value="CN">Cuneo</option><option value="EN">Enna</option><option value="FM">Fermo</option><option value="FE">Ferrara</option><option value="FI">Firenze</option><option value="FG">Foggia</option><option value="FC">Forlì-Cesena</option><option value="FR">Frosinone</option><option value="GE">Genova</option><option value="GO">Gorizia</option><option value="GR">Grosseto</option><option value="IM">Imperia</option><option value="IS">Isernia</option><option value="SP">La Spezia</option><option value="AQ">L'Aquila</option><option value="LT">Latina</option><option value="LE">Lecce</option><option value="LC">Lecco</option><option value="LI">Livorno</option><option value="LO">Lodi</option><option value="LU">Lucca</option><option value="MC">Macerata</option><option value="MN">Mantova</option><option value="MS">Massa-Carrara</option><option value="MT">Matera</option><option value="ME">Messina</option><option value="MI">Milano</option><option value="MO">Modena</option><option value="MB">Monza e della Brianza</option><option value="NA">Napoli</option><option value="NO">Novara</option><option value="NU">Nuoro</option><option value="OT">Olbia-Tempio</option><option value="OR">Oristano</option><option value="PD">Padova</option><option value="PA">Palermo</option><option value="PR">Parma</option><option value="PV">Pavia</option><option value="PG">Perugia</option><option value="PU">Pesaro e Urbino</option><option value="PE">Pescara</option><option value="PC">Piacenza</option><option value="PI">Pisa</option><option value="PT">Pistoia</option><option value="PN">Pordenone</option><option value="PZ">Potenza</option><option value="PO">Prato</option><option value="RG">Ragusa</option><option value="RA">Ravenna</option><option value="RC">Reggio Calabria</option><option value="RE">Reggio Emilia</option><option value="RI">Rieti</option><option value="RN">Rimini</option><option value="RM">Roma</option><option value="RO">Rovigo</option><option value="SA">Salerno</option><option value="VS">Medio Campidano</option><option value="SS">Sassari</option><option value="SV">Savona</option><option value="SI">Siena</option><option value="SR">Siracusa</option><option value="SO">Sondrio</option><option value="TA">Taranto</option><option value="TE">Teramo</option><option value="TR">Terni</option><option value="TO">Torino</option><option value="OG">Ogliastra</option><option value="TP">Trapani</option><option value="TN">Trento</option><option value="TV">Treviso</option><option value="TS">Trieste</option><option value="UD">Udine</option><option value="VA">Varese</option><option value="VE">Venezia</option><option value="VB">Verbano-Cusio-Ossola</option><option value="VC">Vercelli</option><option value="VR">Verona</option><option value="VV">Vibo Valentia</option><option value="VI">Vicenza</option><option value="VT">Viterbo</option>
                                                    </select>
                                                </div>
                                                <div class="campo100">
                                                    <input type="checkbox" name="campo-gdpr" id="campo-gdpr-form-multi-step2" value="1">
                                                    <label for="campo-gdpr-form-multi-step">L'Utente dichiara di aver preso visione dell' informativa resa da parte di Gruppo Santamaria S.p.a ai sensi degli articoli 13 e 14 del Regolamento generale UE sulla protezione dei dati GDPR e scaricabile dal presente sito nella sezione <a target="_blank" style="text-decoration: underline;" href="#">Privacy</a>.</label>
                                                </div>
                                                <div class="campo100">
                                                    <input type="checkbox" name="campo-privacy" id="campo-privacy-form-multi-step2" value="2">
                                                    <label for="campo-privacy-form-multi-step">L'Utente presta il proprio libero ed esplicito consenso per il trattamento di cui all'informativa (dati forniti volontariamente dall'utente).</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-indietro btn-50" onclick="stepper2.previous(); return false;">Indietro</button>
                                            <input type="hidden" name="submitted" value="richiesta" />
                                            <button type="submit" class="btn btn-primary btn-conferma btn-50">Conferma</button>
                                            <div class="clearfix"></div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <!-- -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- CONTATTI -->
            <section id="section8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                            <a href="" class="item">
                                <div class="icon">
                                    <img src="images/phone-call2.svg" alt="" />
                                </div>
                                <h6>Numero Verde Gratuito</h6>
                                <mark>800 82 12 89</mark>
                                <p>dal lunedì al venerdì 9-13/14-18</p>
                            </a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="item">
                                <div class="icon">
                                    <img src="images/placeholder.svg" alt="" />
                                </div>
                                <p><b>La nostra sede è in Via Renato Imbriani, 164 - 95128 Catania (CT).</b></p>
                                <p>Puoi trovarci anche in tutte le filiali del gruppo Credem presenti in Sicilia.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="item">
                                <div class="icon">
                                    <img src="images/envelope.svg" alt="" />
                                </div>
                                <p><b>Per ogni chiarimento scrivici all’indirizzo servizioclienti@prestitifaidate.it</b></p>
                                <p>Il nostro servizio clienti è sempre a tua disposizione e ti risponderà il prima possibile.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- note -->
            <div id="section9">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="collapsible">(*) Note di trasparenza 2021</button>
                            <div class="collapsibleNote">
                                <br/>
                                <p>ESEMPIO: 28.000 € IN 120 RATE DA 279 € TAN 3,54% TAEG 3,72%</p>
                                <p>*NOTE DI TRASPARENZA PER L’ESEMPIO PRESTITI AGEVOLATI RISERVATI AI DIPENDENTI PUBBLICI E STATALI
                                Messaggio pubblicitario con finalità promozionale. L’esempio non costituisce offerta al pubblico. Gruppo Santamaria S.p.A. è un Intermediario del Credito iscritto nell’Elenco Agenti in attività Finanziaria tenuto dall’OAM n. A107. L’approvazione è soggetta alla valutazione del merito del creditizio da parte della società erogante Avvera S.p.A. Al fine di gestire le tue spese in modo responsabile, Gruppo Santamaria S.p.A. ti ricorda, prima di sottoscrivere il contratto, di prendere visione di tutte le condizioni economiche e contrattuali, facendo riferimento alle “Informazioni Europee di Base sul Credito ai Consumatori” consegnato presso la sede dell’Agenzia in Attività Finanziaria Gruppo Santamaria S.p.A. Le condizioni riportate nell’esempio indicato possono variare in funzione dell’età del cliente, L’importo erogato al cliente di cui all’esempio si intende al netto di tutte le spese e i costi trattenuti dalla banca al momento della liquidazione. L’esempio si riferisce ad dipendente pubblico con 35 anni di età ed assunto da 10 anni. Nell’esempio da 28.000,00 € il costo totale del credito è di 5.480,00 € di cui: 310,00 € di spese d’istruttoria; 16,00 € di imposta di bollo; 5.154,00 € di interessi; 0,00 € di commissioni di distribuzione. N.B. Il prestito con cessione del quinto è assistito obbligatoriamente per legge da coperture assicurative a garanzia del rischio vita ed impiego del Cliente ai sensi dell’articolo 54 del D.P.R. 180/1950. I costi sono a carico del Finanziatore. Offerta valida dal 01/01/2021 al 30/06/2021.</p>
                                <br/>
                                <p>ESEMPIO: 18.000 € IN 120 RATE DA 189 € TAN 4,17% TAEG 4,90%</p>
                                <p>*NOTE DI TRASPARENZA PER L’ESEMPIO PRESTITI AGEVOLATI RISERVATI AI PENSIONATI
                                Messaggio pubblicitario con finalità promozionale. L’esempio non costituisce offerta al pubblico. Gruppo Santamaria S.p.A. è un Intermediario del Credito iscritto nell’Elenco Agenti in attività Finanziaria tenuto dall’OAM n. A107. L’approvazione è soggetta alla valutazione del merito del creditizio da parte della società erogante Avvera S.p.A. Al fine di gestire le tue spese in modo responsabile, Gruppo Santamaria S.p.A. ti ricorda, prima di sottoscrivere il contratto, di prendere visione di tutte le condizioni economiche e contrattuali, facendo riferimento alle “Informazioni Europee di Base sul Credito ai Consumatori” consegnato presso la sede dell’Agenzia in Attività Finanziaria Gruppo Santamaria S.p.A. Le condizioni riportate nell’esempio indicato possono variare in funzione dell’età del cliente, L’importo erogato al cliente di cui all’esempio si intende al netto di tutte le spese e i costi trattenuti dalla banca al momento della liquidazione. L’esempio si riferisce ad un pensionato di 60 anni di età. Nell’esempio da 18.000,00 € il costo totale del credito è di 4.680,00 € di cui: 375,00 € di spese d’istruttoria; 16,00 € di imposta di bollo; 4.160,03 € di interessi; 128,97 € di commissioni di distribuzione. N.B. Il prestito con cessione del quinto è assistito obbligatoriamente per legge da coperture assicurative a garanzia del rischio vita ed impiego del Cliente ai sensi dell’articolo 54 del D.P.R. 180/1950. I costi sono a carico del Finanziatore. Offerta valida dal 01/01/2021 al 30/06/2021.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8">
                            <p>Gruppo Santamaria S.p.A<br/>
                            <br/>
                            P.IVA 09334011005 Sede Legale Via Matteo Renato Imbriani, 164 – 95128 Catania<br/>
                            Agente in Attività Finanziaria Avvera S.p.A. - Gruppo Bancario Credito Emiliano – OAM n. A 107<br/>
                            Email: servizioclienti@prestitifaidate.it <a href="#">Convenzione Inps</a> | <a href="#">Convenzione Noipa</a><br/>
                            <br/>
                            Credits: <a href="#">TLC Web Solutions</a></p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4">
                            <img src="images/logo.svg" alt="" />
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- WRAP 1920px / -->
    </div>
    <!-- WRAP 2560px / -->

    <div id="phone-number-mobile">
        <a href="#">NUMERO VERDE GRATUITO<img src="images/phone-call.svg" alt="">800821289</a>
    </div>
    <div id="scroll-top">
        <img src="images/scrolltop.svg" alt="">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.2/compressed/legacy.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.2/compressed/picker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.2/compressed/picker.date.js"></script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>
</html>