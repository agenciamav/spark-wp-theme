<?php
if ( ! function_exists( 'add_action' )) {
    echo 'Heei... O que está fazendo?';
    exit;
} ?>

<h2>Opções gerais</h2>

<?php
$form = new \TypeRocket\Form();
$form->setGroup( $this->getName() );
?>

<div id="tr-dev-content" class="typerocket-container">
    <?php
    echo $form->open();

    // about
    $contact = array(
        $form->text('Nome da Empresa'),
        $form->text('Endereço'),
        $form->text('Cidade'),
        $form->text('CEP'),
        $form->text('Telefone'),
        $form->text('E-mail'),
    );
    $about = $form->getFromFieldsString( $contact );

    // api
    $help = '<a target="blank" href="https://developers.google.com/maps/documentation/embed/guide#api_key">Get Your Google Maps API</a> to activate maps in the theme.';
    $api = $form->password( 'Google Maps API Key')->setSetting('help', $help)->setAttribute('autocomplete', 'new-password');

    // save
    $form->setDebugStatus( false );
    $save = $form->submit( 'Salvar' );

    // layout
    tr_tabs()->setSidebar( $save )
    ->addTab( 'Dados de contato', $about )
    ->addTab( 'APIs', $api )
    ->render( 'box' );
    echo $form->close();
    ?>

</div>