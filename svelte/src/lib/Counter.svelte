<svelte:options tag="test-counter"/>
<script lang="ts">
    export let count: number = 0
    let element: Element;

    const increment = () => {
        count += 1

        let ev = new CustomEvent("on-increment", {
            bubbles: true,
            composed: true,
            detail: {value: count}
        });

        element.dispatchEvent(ev);
    }
</script>

<button bind:this={element} on:click={increment}>
    Increment
</button>
<p data-testId="counter-value">{count}</p>
