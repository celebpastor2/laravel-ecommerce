import React from "react";
import { createRoot } from "react-dom/client";

function App(){
    const [checkState, setCheckState] = React.useState("React")
    return <h4>Welcome to {checkState}</h4>
}

if(document.getElementById("app")){
    const root = createRoot(document.getElementById("app"))
    root.render( <App /> );
}