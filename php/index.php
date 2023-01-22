<script src="./custom-elements.js"></script>

<test-counter id="counter"></test-counter>

<script>
    const counter = document.getElementById('counter');
    counter.addEventListener('on-increment', (ev) => {
        fetch("writeToFile.php?input=" + ev.detail.value);
    });
</script>