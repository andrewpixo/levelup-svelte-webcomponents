<svelte:options tag="playing-card" />

<script lang="ts">
 export let isFaceUp: boolean = true;
 let isFlippingDown: boolean=  false;

     function flip() {
      if(isFaceUp) {
        isFlippingDown = true;
        setTimeout(() => {
          isFlippingDown = false;
        }, 1000);
      }

    isFaceUp = !isFaceUp;
    }

    fetch("https://deckofcardsapi.com/api/deck/new/draw/?count=1");
</script>

<div on:click={flip} class="card" class:card--is-face-up={isFaceUp} class:card--is-flipping-down={isFlippingDown}>
 hello
</div>

<style lang="scss">
 @keyframes flip {
           0% {
            background-color: red;
                transform: rotateY(0deg);
            }
    49.9% {
    background-color: red;
    }
  50% {
   background-color: green;
 }
            100% {
             background-color: green;
                transform: rotateY(180deg);
            }
 }
 @keyframes flip-reverse {
           0% {
            background-color: green;
                transform: rotateY(180deg);
            }
  49.9% {
    background-color: green;
  }
    50% {
    background-color: red;
    }
            100% {
             background-color: red;
                transform: rotateY(0deg);
            }
 }

    .card {
        background-color: red;
        border-radius: 5px;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
      width: 100px;
      height: 100px;



     &--is-face-up {
        background-color: green;
      animation: flip 1s forwards;
      }

     &--is-flipping-down {
        background-color: red;
      animation: flip-reverse 1s forwards;
     }
    }
</style>