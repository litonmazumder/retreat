import * as pdfjsLib from "pdfjs-dist";

// Set the worker file
pdfjsLib.GlobalWorkerOptions.workerSrc = new URL(
    "pdfjs-dist/build/pdf.worker.min.mjs",
    import.meta.url
).toString();

document.addEventListener("DOMContentLoaded", async () => {

    const container = document.getElementById("pdf-container");

    if (!container) return;

    const pdfUrl = container.dataset.pdf;

    try {

        const loadingTask = pdfjsLib.getDocument(pdfUrl);

        const pdf = await loadingTask.promise;

        for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {

            const page = await pdf.getPage(pageNumber);

            const viewport = page.getViewport({
                scale: window.innerWidth < 768 ? 1.2 : 1.6,
            });

            const canvas = document.createElement("canvas");

            canvas.className =
                "mx-auto mb-8 w-full max-w-4xl rounded-xl shadow-lg bg-white";

            const context = canvas.getContext("2d");

            canvas.width = viewport.width;
            canvas.height = viewport.height;

            container.appendChild(canvas);

            await page.render({
                canvasContext: context,
                viewport,
            }).promise;
        }

    } catch (error) {

        console.error(error);

        container.innerHTML =
            `<div class="rounded-xl bg-red-50 p-6 text-red-600">
                Failed to load PDF.
            </div>`;
    }

});