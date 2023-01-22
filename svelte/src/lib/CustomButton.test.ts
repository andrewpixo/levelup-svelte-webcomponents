import CustomButton from "./CustomButton.svelte";
import type {RenderResult} from "@testing-library/svelte";
import {fireEvent, render} from "@testing-library/svelte";

describe("CustomButton", () => {
    let result: RenderResult<CustomButton>;
    beforeEach(() => {
        result = render(CustomButton);
    })

    it("works", () => {
        expect(result).not.toBeUndefined();
    });
    it("dispatches a custom event when the left button is clicked", async () => {
        let eventWasCalled = false;
        result.container.addEventListener("custom-button-click", () => {
            eventWasCalled = true;
        });

        let button = await result.findByTestId("left-btn")
        await fireEvent.click(button);

        expect(eventWasCalled).toEqual(true);
    })

    it("dispatches a custom event when the right button is clicked", async () => {
        let eventWasCalled = false;
        result.container.addEventListener("custom-button-click", () => {
            eventWasCalled = true;
        });

        let button = await result.findByTestId("right-btn")
        await fireEvent.click(button);

        expect(eventWasCalled).toEqual(true);
    });

    it("indicates which button was clicked when clicking the left button", async () => {
        let eventValue = false;
        result.container.addEventListener("custom-button-click", (ev: any) => {
            eventValue = ev.detail.version;
        });

        let leftButton = await result.findByTestId("left-btn")
        await fireEvent.click(leftButton);
        expect(eventValue).toEqual("left");
    });

    it("indicates which button was clicked when clicking the right button", async () => {
        let eventValue = false;
        result.container.addEventListener("custom-button-click", (ev: any) => {
            eventValue = ev.detail.version;
        });

        let rightButton = await result.findByTestId("right-btn")
        await fireEvent.click(rightButton);
        expect(eventValue).toEqual("right");
    });

})