document.addEventListener("DOMContentLoaded", function() {
    const addMedicineButton = document.getElementById("addMedicine");
    const medicineInputs = document.getElementById("medicineInputs");

    // Add medicine input fields
    addMedicineButton.addEventListener("click", function() {
        const medicineInput = document.createElement("div");
        medicineInput.classList.add("medicineInput");
        medicineInput.innerHTML = `
            <label for="medicine">Select Medicine:</label>
            <select name="medicine[]" class="medicine">
                <option value="Amoxicillin">Amoxicillin</option>
                <option value="Paracetamol">Paracetamol</option>
                <option value="Aspirin">Aspirin</option>
                <option value="Morphine">Morphine</option>
                <option value="Penicillin">Penicillin</option>
                <option value="Insulin">Insulin</option>
                <option value="Lanoxin">Lanoxin </option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity[]" class="quantity" min="1">
            <button type="button" class="removeMedicine">Remove</button>
        `;
        medicineInputs.appendChild(medicineInput);
    });

    // Remove medicine input fields
    medicineInputs.addEventListener("click", function(event) {
        if (event.target.classList.contains("removeMedicine")) {
            event.target.closest(".medicineInput").remove();
        }
    });
});
