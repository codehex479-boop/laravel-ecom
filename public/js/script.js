// CART FUNCTIONALITY
document.addEventListener("DOMContentLoaded", () => {
  const cartTable = document.querySelector(".cart-table tbody");
  const cartSummary = document.querySelector(".cart-summary span");

  if (cartTable && cartSummary) {
    function updateCartTotal() {
      let total = 0;
      const rows = cartTable.querySelectorAll("tr");

      rows.forEach(row => {
        const priceEl = row.querySelector("td:nth-child(2)");
        const qtyEl = row.querySelector("input[type='number']");
        const totalEl = row.querySelector("td:nth-child(4)");

        if (priceEl && qtyEl && totalEl) {
          const price = parseFloat(priceEl.textContent.replace("$", ""));
          const qty = parseInt(qtyEl.value);
          const rowTotal = price * qty;
          totalEl.textContent = `$${rowTotal.toFixed(2)}`;
          total += rowTotal;
        }
      });

      cartSummary.textContent = `$${total.toFixed(2)}`;
    }

    // Run initially
    updateCartTotal();

    // Update when quantity changes
    cartTable.addEventListener("input", (e) => {
      if (e.target.type === "number") {
        updateCartTotal();
      }
    });
  }
});