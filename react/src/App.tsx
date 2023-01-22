import './App.css'
import {useEffect, useRef, useState} from "react";

declare global {
    namespace JSX {
        interface IntrinsicElements {
            ['test-counter']: any;
            ['custom-button']: any;
        }
    }
}


function App() {
    const [readCounter, setReadCounter] = useState(3);
    const [lastButtonPress, setLastButtonPress] = useState("none");
    const ref = useRef<Element>(null);
    const buttonRef = useRef<Element>(null);

    useEffect(() => {
        if (ref && ref.current) {
            ref.current.addEventListener("on-increment", (ev) => {
                const customEvent = ev as any as { detail: { value: number } };

                setReadCounter(customEvent.detail.value);
            })

        }
    }, [ref])
    useEffect(() => {
        if (buttonRef && buttonRef.current) {
            buttonRef.current.addEventListener("custom-button-click", (ev: any) => {
                let version = ev.detail.version;
                setLastButtonPress(version);
            })
        }
    }, [buttonRef])


    return <>
        <p>Counter from WebComponent is: {readCounter}</p>
        <test-counter ref={ref} count={3}/>
        <p>Last button pressed from WebComponent is : {lastButtonPress}</p>
        <custom-button ref={buttonRef}>
            <span slot={"left"}>Left Button</span>
            <span slot={"right"}>Right Button</span>
        </custom-button>

    </>

}

export default App
