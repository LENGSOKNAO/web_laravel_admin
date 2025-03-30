<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet"
        />
        <title>admin</title>
        <style>
            html,
            body {
                font-family: "Roboto", sans-serif;
            }
        </style>
    </head>
    <body>
        <header>
            <nav
                style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 12px 40px;
                    border-bottom: 1px solid rgb(203, 208, 221);
                    height: 50px;
                "
            >
                <div
                    style="
                        display: flex;
                        align-items: center;
                        gap: 12px; 
                    "
                >
                    <img
                        style="width: 25px"
                        src="data:image/png;base64,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"
                        alt=""
                    />
                    <h2
                        style="
                            font-size: 24px;  
                            font-weight: 600;  
                            color: rgb(117, 124, 145);
                        "
                    >
                        phoenix
                    </h2>
                </div>
                <div
                    style="
                        display: flex;
                        align-items: center;
                        border: 1px solid rgb(203, 208, 221);
                        border-radius: 32px; /* rounded-4xl (equivalent to 32px) */
                    "
                >
                    <svg
                        style="margin-left: 0.5rem; margin-right: 0.5rem;" 
                        xmlns="http://www.w3.org/2000/svg"
                        height="17px"
                        viewBox="0 -960 960 960"
                        width="24px"
                        fill="rgb(117,124,145)"
                    >
                        <path
                            d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"
                        />
                    </svg>
                    <input
                        style="
                            width: 350px;
                            font-size: 13px;
                            outline: none;
                            padding: 5px;
                            border:none;
                            border-radius: 32px;
                        "
                        type="text"
                        placeholder="Search..."
                    />
                </div>
                <div
                    style="
                        display: flex;
                        align-items: center;
                        gap: 12px; 
                    "
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="24px"
                        viewBox="0 -960 960 960"
                        width="24px"
                        fill="rgb(117,124,145)"
                    >
                        <path
                            d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="24px"
                        viewBox="0 -960 960 960"
                        width="24px"
                        fill="rgb(117,124,145)"
                    >
                        <path
                            d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"
                        />
                    </svg>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        height="24px"
                        viewBox="0 -960 960 960"
                        width="24px"
                        fill="rgb(117,124,145)"
                    >
                        <path
                            d="M240-160q-33 0-56.5-23.5T160-240q0-33 23.5-56.5T240-320q33 0 56.5 23.5T320-240q0 33-23.5 56.5T240-160Zm240 0q-33 0-56.5-23.5T400-240q0-33 23.5-56.5T480-320q33 0 56.5 23.5T560-240q0 33-23.5 56.5T480-160Zm240 0q-33 0-56.5-23.5T640-240q0-33 23.5-56.5T720-320q33 0 56.5 23.5T800-240q0 33-23.5 56.5T720-160ZM240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400ZM240-640q-33 0-56.5-23.5T160-720q0-33 23.5-56.5T240-800q33 0 56.5 23.5T320-720q0 33-23.5 56.5T240-640Zm240 0q-33 0-56.5-23.5T400-720q0-33 23.5-56.5T480-800q33 0 56.5 23.5T560-720q0 33-23.5 56.5T480-640Zm240 0q-33 0-56.5-23.5T640-720q0-33 23.5-56.5T720-800q33 0 56.5 23.5T800-720q0 33-23.5 56.5T720-640Z"
                        />
                    </svg>
                    <img
                        style="border-radius: 24px;"
                        src="https://phoenix-react.prium.me/static/media/57.971121ad428013d5bb70.webp"
                        alt=""
                    />
                </div>
            </nav>
            {{ $slot }}
        </header>
    </body>
</html>
