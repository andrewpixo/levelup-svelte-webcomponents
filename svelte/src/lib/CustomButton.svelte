<svelte:options tag="custom-button"/>
<style>
    .button-group {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .button-element {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 0.5rem 1rem;
        border: 1px solid #ccc;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }

    .button-element:hover {
        background-color: #eee;
    }

    .button-element:active {
        background-color: #ddd;
    }

    .button-element-left {
        border-top-left-radius: 0.5rem;
        border-bottom-left-radius: 0.5rem;
    }

    .button-element-right {
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }
</style>
<script lang="ts">
    let leftElement: Element;
    let rightElement: Element;
    const handleClick = (version?: string) => {
        let ev = new CustomEvent("custom-button-click", {
            detail: {version},
            bubbles: true,
            composed: true,
        });

        if (version === "left") leftElement.dispatchEvent(ev);
        else if (version === "right") rightElement.dispatchEvent(ev);
    }
</script>

<div part="button-group" class="button-group">
    <button data-testid="left-btn" part="button-element" class="button-element button-element-left"
            bind:this={leftElement}
            on:click={() => handleClick("left")}>
        <slot name="left"/>
    </button>
    <button data-testid="right-btn" part="button-element" class="button-element button-element-right"
            bind:this={rightElement}
            on:click={() => handleClick("right")}>
        <slot name="right"/>
    </button>
</div>