<!-- FOOTER -->
    <footer  style="display: flex; justify-content: center;">
        <div class="s-12 l-8">
            <p style="color: rgba(0, 0, 0, 0.6)">Php code and HTML recode<span style="color: tomato;"> max.baranowski@mail.ru</span></p>
            <p style="color: rgba(0, 0, 0, 0.6)">
                <span>Original HTML template was made with Response4 by  Responsee Team, Vision Design - graphic zoo</span>
            </p>
        </div>
    </footer>
<?php
if(isset($connection)){
    mysqli_close($connection);
}
?>
<style>
    footer p{
        text-align: center;
    }
</style>
<script>
     var consoleStyles = {
        'h1': 'font: 2.5em/1 Arial; color: crimson;',
        'h2': 'font: 2em/1 Arial; color: orangered;',
        'h3': 'font: 1.5em/1 Arial; color: olivedrab;',
        'bold': 'font: bold 1.3em/1 Arial; color: midnightblue;',
        'warn': 'padding: 0 .5rem; background: crimson; font: 1.6em/1 Arial; color: white;'
    };  
    function log ( msg, style ) {
        if ( !style || !consoleStyles[ style ] ) {
            style = 'bold';
        }
        console.log ( '%c' + msg, consoleStyles[ style ] );
    }
    setTimeout(log ( `  Zeby pokazać co mogę zrobic, już zrobiłem trzeba bylo jakto wyładowac ten blog do hostyngu. 
    Użuwał cba.pl, darmowy hostyng, ale na górze strony pojawiła się paska ze strona jes na cba.pl, to mnie nie podoba. 
    Można byłoby wylaczyc wszystkie skrypty, ale to trzeba przetworzyc html do string, po tym znalezc wsystkie scripty i usunuc ich. 
    I juz potym z pomocy Ajax znowy odprawic do uzutkownika. 
    Moge to zrobic ale to nie ma sensu. Pracuje i dobrze, to tylko pokaz ze coś znam z PHP i moge zrobic bloga.`, 'warn' ), 3000);
    
</script>
