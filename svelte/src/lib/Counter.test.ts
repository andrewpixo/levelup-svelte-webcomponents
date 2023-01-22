import {fireEvent, render, RenderResult} from "@testing-library/svelte";
import Counter from "./Counter.svelte";

describe("Counter", () => {
    let result: RenderResult<Counter>;

    beforeEach(() => {
        result = render(Counter);
    })

    it("works", () => {
        expect(result).not.toBeUndefined();
    });
    it("increments count when the button is pushed", async () => {
        let button = await result.findByText("Increment");
        await fireEvent.click(button);

        let text = await result.findByTestId("counter-value");
        expect(text.textContent).toEqual("1");
    })
    it("defaults the count to the given value", async () => {
        result.unmount();
        let newResult = render(Counter, {count: 5});

        let text = await newResult.findByTestId("counter-value");
        expect(text.textContent).toEqual("5");
    })
    it("dispatches a custom event when the button is clicked", async () => {
        let eventWasCalled = false;
        result.container.addEventListener("on-increment", () => {
            eventWasCalled = true;
        });

        let button = await result.findByText("Increment");
        await fireEvent.click(button);

        expect(eventWasCalled).toEqual(true);
    })


})