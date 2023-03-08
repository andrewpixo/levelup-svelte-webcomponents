import Counter from "./lib/Counter.svelte";

if (process.env.NODE_ENV !== "production") {
    const app = new Counter({
        target: document.getElementById("app"),
    });
}




