$(document).ready(function () {
    $(".your-class").slick({
        dots: true,
        autoplay: true,
    });
});

// canvas

document.addEventListener("DOMContentLoaded", function () {
    const canvas = new fabric.Canvas("main-grave");
    const upperCanvas = document.querySelector(".upper-canvas");
    const mainImg = "../assets/images/graves/main-grave1.png";

    function resizeCanvas() {
        const container = document.getElementById("canvas-container");
        const canvasElement = document.getElementById("canvas");

        if (!container || !canvasElement) {
            return; // Return if either element is not found
        }

        const containerWidth = container.clientWidth;
        const canvasWidth = Math.min(containerWidth, 800); // Adjust the maximum width as needed
        const canvasHeight = (canvasWidth / 800) * 600; // Maintain the 4:3 aspect ratio

        canvasElement.width = canvasWidth;
        canvasElement.height = canvasHeight;

        canvas.setDimensions({
            width: canvasWidth,
            height: canvasHeight,
        });
    }

    // Add the main image to the canvas
    fabric.Image.fromURL(mainImg, function (img) {
        // Set image properties
        img.set({
            selectable: false, // Prevents the image from being selected
            evented: false, // Prevents the image from triggering events
            resizable: false, // Disable resizing
            draggable: false, // Disable dragging
        });

        // Calculate the aspect ratio of the image
        const aspectRatio = img.width / img.height;

        // Determine the dimensions of the scaled image to fit within the canvas
        let scaledWidth = canvas.width;
        let scaledHeight = scaledWidth / aspectRatio;

        if (scaledHeight > canvas.height) {
            scaledHeight = canvas.height;
            scaledWidth = scaledHeight * aspectRatio;
        }

        // Calculate the center position of the canvas
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;

        // Set the position and dimensions of the image
        img.set({
            left: centerX - scaledWidth / 2,
            top: centerY - scaledHeight / 2,
            width: scaledWidth,
            height: scaledHeight,
        });

        // Add the image to the canvas
        canvas.add(img);
        canvas.renderAll();
    });

    // Call the resizeCanvas function on window resize
    window.addEventListener("resize", resizeCanvas);

    // Call the resizeCanvas function initially to set the canvas size
    resizeCanvas();

    // Listen to canvas object selection event
    canvas.on("selection:created", function (event) {
        activeObject = event.target;
    });

    canvas.on("selection:updated", function (event) {
        activeObject = event.target;
    });

    canvas.on("selection:cleared", function () {
        activeObject = null;
    });

    fabric.Image.fromURL(mainImg, function (img) {
        // Set image properties
        img.set({
            selectable: false, // Prevents the image from being selected
            evented: false, // Prevents the image from triggering events
            resizable: false, // Disable resizing
            draggable: false, // Disable dragging
        });

        // Add the image to the canvas
        canvas.add(img);
        canvas.renderAll();
    });

    const canvasContainer = document.querySelector(".canvas-container");
    let currentFillPattern = null;

    const allSmallImages = document.querySelectorAll(".pattern-materials img");
    allSmallImages.forEach((smallImg) => {
        smallImg.addEventListener("click", function () {
            // clean up previous image
            if (currentFillPattern) {
                currentFillPattern.remove();
                allSmallImages.forEach((smallImg) =>
                    smallImg.classList.remove("active")
                );
            }

            const fillPattern = document.createElement("img");
            // todo remove when site goes live
            // const imageUrl = smallImg.src.replace(
            //     "http://127.0.0.1:8000/assets/images/",
            //     "assets/images/b"
            // );
            const imageUrl = smallImg.src.replace(".png", "b.png");

            fillPattern.classList.add("grave-pattern");
            fillPattern.src = `${imageUrl}`;
            upperCanvas.insertAdjacentElement("beforebegin", fillPattern);

            smallImg.classList.add("active");

            currentFillPattern = fillPattern;
        });
    });

    // decorating
    const allDecors = document.querySelectorAll(".decorating img");
    allDecors.forEach((decor) => {
        decor.addEventListener("click", function () {
            allDecors.forEach((decor) => decor.classList.remove("active"));
            // console.log(decor.nextElementSibling);
            decor.classList.add("active");
        });
    });

    // step 2, adding text

    // Function to add text to the canvas
    const inputUsername = document.getElementById("username");
    const inputSurname = document.getElementById("surname");
    const inputDate = document.getElementById("date");
    const inputText1 = document.getElementById("text-line-1");
    const inputText2 = document.getElementById("text-line-2");

    let usernameText = null;
    let surnameText = null;
    let dateText = null;
    let arbitraryText1 = null;
    let arbitraryText2 = null;

    let activeObject = null;

    function addTextToCanvas() {
        const usernameValue = inputUsername.value.trim();
        const surnameValue = inputSurname.value.trim();
        const dateValue = inputDate.value.trim();
        const arbitraryValue1 = inputText1.value.trim();
        const arbitraryValue2 = inputText2.value.trim();

        // Add or update username text
        if (usernameValue !== "") {
            if (!usernameText) {
                usernameText = new fabric.Text(usernameValue, {
                    left: 150,
                    top: 150,
                    fontSize: 24,
                    fill: "black",
                    selectable: true,
                    hasControls: true,
                });
                canvas.add(usernameText);
            } else {
                usernameText.set("text", usernameValue);
            }
            canvas.setActiveObject(usernameText);
        } else {
            canvas.remove(usernameText);
            usernameText = null;
        }

        // Add or update surname text
        if (surnameValue !== "") {
            if (!surnameText) {
                surnameText = new fabric.Text(surnameValue, {
                    left: 150,
                    top: 175,
                    fontSize: 24,
                    fill: "black",
                    selectable: true,
                    hasControls: true,
                });
                canvas.add(surnameText);
            } else {
                surnameText.set("text", surnameValue);
            }
            canvas.setActiveObject(surnameText);
        } else {
            canvas.remove(surnameText);
            surnameText = null;
        }

        // Add or update date text
        if (dateValue !== "") {
            if (!dateText) {
                dateText = new fabric.Text(dateValue, {
                    left: 150,
                    top: 200,
                    fontSize: 24,
                    fill: "black",
                    selectable: true,
                    hasControls: true,
                });
                canvas.add(dateText);
            } else {
                dateText.set("text", dateValue);
            }
            canvas.setActiveObject(dateText);
        } else {
            canvas.remove(dateText);
            dateText = null;
        }

        // Add or update arbitrary text
        if (arbitraryValue1 !== "") {
            if (!arbitraryText1) {
                arbitraryText1 = new fabric.Text(arbitraryValue1, {
                    left: 150,
                    top: 225,
                    fontSize: 24,
                    fill: "black",
                    selectable: true,
                    hasControls: true,
                });
                canvas.add(arbitraryText1);
            } else {
                arbitraryText1.set("text", arbitraryValue1);
            }
            canvas.setActiveObject(arbitraryText1);
        } else {
            canvas.remove(arbitraryText1);
            arbitraryText1 = null;
        }

        // Add or update arbitrary text 2
        if (arbitraryValue2 !== "") {
            if (!arbitraryText2) {
                arbitraryText2 = new fabric.Text(arbitraryValue2, {
                    left: 150,
                    top: 250,
                    fontSize: 24,
                    fill: "black",
                    selectable: true,
                    hasControls: true,
                });
                canvas.add(arbitraryText2);
            } else {
                arbitraryText2.set("text", arbitraryValue2);
            }
            canvas.setActiveObject(arbitraryText2);
        } else {
            canvas.remove(arbitraryText2);
            arbitraryText2 = null;
        }

        // Request canvas rendering to update the changes
        canvas.requestRenderAll();
    }

    // Event listener for the input
    inputUsername?.addEventListener("input", addTextToCanvas);
    inputSurname?.addEventListener("input", addTextToCanvas);
    inputDate?.addEventListener("input", addTextToCanvas);
    inputText1?.addEventListener("input", addTextToCanvas);
    inputText2?.addEventListener("input", addTextToCanvas);

    // Function to change font family of selected text
    function changeFontFamily(fontFamilyValue) {
        const activeObjects = canvas.getActiveObjects();
        activeObjects.forEach((obj) => {
            if (obj.type === "text") {
                obj.set("fontFamily", fontFamilyValue);
            }
        });

        // Render the canvas to see the font family changes
        canvas.renderAll();
    }

    // Event listener for font family select
    const fontFamilySelect = document.getElementById("fontFamilySelect");
    fontFamilySelect?.addEventListener("change", function () {
        const fontFamilyValue = fontFamilySelect.value;
        changeFontFamily(fontFamilyValue);
    });

    // font size manipulation

    const decreaseButton = document.getElementById("decrease-font");
    const increaseButton = document.getElementById("increase-font");
    const fontSizeValue = document.getElementById("font-size-value");

    decreaseButton?.addEventListener("click", function () {
        const currentFontSize = parseInt(fontSizeValue.textContent, 10);
        if (currentFontSize > 1) {
            fontSizeValue.textContent = currentFontSize - 1;
            updateTextFontSize(currentFontSize - 1);
        }
    });

    increaseButton?.addEventListener("click", function () {
        const currentFontSize = parseInt(fontSizeValue.textContent, 10);
        fontSizeValue.textContent = currentFontSize + 1;
        updateTextFontSize(currentFontSize + 1);
    });

    function updateTextFontSize(newFontSize) {
        const activeObjects = canvas.getActiveObjects();

        activeObjects.forEach(function (object) {
            if (object.type === "text") {
                object.set("fontSize", newFontSize);
            }
        });

        canvas.renderAll();
    }

    // Function to change text color and selected object color
    const colorPalette = document.querySelector(".color-pallete");

    colorPalette?.addEventListener("click", function (e) {
        const listItem = e.target.closest("li");
        const activeObjects = canvas.getActiveObjects();

        if (listItem && activeObjects) {
            const backgroundColor = listItem.style.backgroundColor;

            activeObjects.forEach(function (object) {
                if (object.type === "text") {
                    object.set("fill", backgroundColor);
                } else if (
                    object.type === "image" &&
                    object.getElement().nodeName === "svg"
                ) {
                    const svgElement = object.getElement();
                    const svgGroup = svgElement.querySelector("g");
                    if (svgGroup) {
                        svgGroup.setAttribute("fill", backgroundColor);
                    }
                }
            });

            canvas.renderAll();
        }
    });
    // Function to add image to canvas and fill with selected font color
    const svgList = document.querySelectorAll(".ornament svg"); // Change this selector accordingly

    // Keep track of added images
    let addedImageCount = 0;

    svgList.forEach(function (svg) {
        svg.addEventListener("click", function () {
            // Check if maximum limit of 2 images is reached
            if (addedImageCount === 2) {
                console.log("Maximum limit of 2 images reached.");
                return;
            }

            const backgroundColor = getSelectedFontColor();

            // Clone the SVG element
            const svgClone = svg.cloneNode(true);

            // Modify the fill attribute of the <g> element within the cloned SVG
            const svgGroup = svgClone.querySelector("g");
            if (svgGroup) {
                svgGroup.setAttribute("fill", backgroundColor);
            }

            fabric.Image.fromURL(svgToDataURL(svgClone), function (img) {
                img.set({
                    left: 0,
                    top: 0,
                });

                canvas.add(img);
                canvas.renderAll();

                // Increment the added image count
                addedImageCount++;
            });
        });
    });

    // Helper function to convert SVG to Data URL
    function svgToDataURL(svg) {
        const serialized = new XMLSerializer().serializeToString(svg);
        return "data:image/svg+xml;base64," + btoa(serialized);
    }

    // Helper function to get selected font color
    function getSelectedFontColor() {
        const activeObjects = canvas.getActiveObjects();
        if (activeObjects && activeObjects.length > 0) {
            const firstObject = activeObjects[0]; // Assuming you want to take the color from the first selected text object
            if (firstObject.type === "text") {
                return firstObject.fill;
            }
        }
        return "black"; // Default color if no text is selected
    }

    // Function to remove selected images from canvas
    const pickOrnamentImages = document.querySelector(".pick-ornament img");

    pickOrnamentImages?.addEventListener("click", function () {
        const activeObjects = canvas.getActiveObjects();
        if (activeObjects.length > 0) {
            activeObjects.forEach(function (object) {
                if (object.type === "image") {
                    canvas.remove(object);

                    // Decrement the added image count
                    addedImageCount--;
                }
            });

            canvas.discardActiveObject();
            canvas.renderAll();
        }
    });

    // image upload

    const uploadInput = document.getElementById("uploadInput");
    const uploadButton = document.getElementById("uploadButton");

    // Event listener for button click to trigger file upload input
    uploadButton?.addEventListener("click", function () {
        // Programmatically trigger a click event on the upload input
        uploadInput.click();
    });

    // Event listener for file input change
    uploadInput?.addEventListener("change", function (event) {
        const selectedFile = event.target.files[0];

        // Update the button text with the uploaded image's name
        const fileName =
            selectedFile.name.length > 10
                ? selectedFile.name.substring(0, 16) + "..."
                : selectedFile.name;

        uploadButton.textContent = fileName;
    });

    // switching between tabs using buttons

    const switchToProfileButton = document.getElementById("switchToProfile");

    const profileTabContent = document.getElementById("profile");
    const profileTabButton = document.getElementById("profile-tab");

    const homeTabContent = document.getElementById("home");
    const homeTabButton = document.getElementById("home-tab");

    const contactTabContent = document.getElementById("contact");
    const contactTabButton = document.getElementById("contact-tab");

    switchToProfileButton?.addEventListener("click", function () {
        // switch to the second tab when the button is clicked
        profileTabContent.classList.add("active", "show");
        profileTabButton.classList.add("active");

        // Hide the content of the first tab
        homeTabContent.classList.remove("active", "show");
        homeTabButton.classList.remove("active");
    });

    const switchBackToHomeButton = document.getElementById("switchBackToHome");

    switchBackToHomeButton?.addEventListener("click", function () {
        homeTabContent.classList.add("active", "show");
        homeTabButton.classList.add("active");

        profileTabContent.classList.remove("active", "show");
        profileTabButton.classList.remove("active");
    });

    const switchToContactButton = document.getElementById("switchToContact");

    switchToContactButton?.addEventListener("click", function () {
        contactTabContent.classList.add("active", "show");
        contactTabButton.classList.add("active", "show");

        profileTabContent.classList.remove("active", "show");
        profileTabButton.classList.remove("active");
    });

    const switchBackToProfile = document.getElementById("switchBackToProfile");

    switchBackToProfile?.addEventListener("click", function () {
        profileTabContent.classList.add("active", "show");
        profileTabButton.classList.add("active");

        contactTabContent.classList.remove("active", "show");
        contactTabButton.classList.remove("active", "show");
    });

    // choose grave type

    const graveType = document.querySelector(".grave-type");
    const graveTypeButtons = graveType.querySelectorAll("button");

    graveType.addEventListener("click", function (e) {
        const selectType = e.target.closest("button");
        graveTypeButtons.forEach((btn) => {
            btn.classList.remove("active");
        });

        if (!selectType) return;

        selectType.classList.add("active");
    });
});
