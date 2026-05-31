</main>
<footer style="
    text-align: center;
    padding: 16px;
    color: #64748b;
    font-size: .85rem;
    background: #e2e8f0;
">
    <?php
        // Punto 6 del taller: footer con fecha del día de ejecución
        $fechaHoy = new DateTime();
        echo 'Universidad Tecnológica de Panamá  | '
           . 'Desarrollo de Software VII  | '
           . 'Mas, Córdoba, Franco | '
           . htmlspecialchars($fechaHoy->format('d/m/Y')); // metodo de la fecha, pero creo que tira el dia de mañana blud
        
    ?>
</footer>
</body>
</html>