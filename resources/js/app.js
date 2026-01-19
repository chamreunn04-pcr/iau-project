// resources/js/app.js
// import "./bootstrap";
import "./settings";

// ======================
// CSS IMPORTS (REQUIRED)
// ======================
import "flatpickr/dist/flatpickr.css";
import "aos/dist/aos.css";

// ======================
// JS LIBRARIES
// ======================
import AOS from "aos";
import ApexCharts from "apexcharts";
import TomSelect from "@tabler/core/dist/libs/tom-select/dist/js/tom-select.complete.js";
import flatpickr from "flatpickr";

// Tabler Core
import "@tabler/core/dist/js/tabler.js";

// Expose globals if needed
window.AOS = AOS;
window.ApexCharts = ApexCharts;

document.addEventListener("DOMContentLoaded", () => {
    // ======================
    // AOS INIT
    // ======================
    AOS.init({
        duration: 600,
        easing: "ease-out",
        once: false,
        offset: 120,
    });

    // ======================
    // FLATPICKR (LOCALIZED)
    // ======================
    const locale = window.APP_LOCALE ? window.APP_LOCALE : "en";
    const i18n = window.FLATPICKR_I18N ? window.FLATPICKR_I18N : {};

    const monthNames =
        i18n.months && i18n.months[locale] ? i18n.months[locale] : [];

    const weekdayNames =
        i18n.weekdays && i18n.weekdays[locale] ? i18n.weekdays[locale] : [];

    flatpickr(".datepicker", {
        dateFormat: "Y-m-d",
        allowInput: true,

        locale: {
            firstDayOfWeek: 1,
            months: {
                shorthand: monthNames,
                longhand: monthNames,
            },
            weekdays: {
                shorthand: weekdayNames,
                longhand: weekdayNames,
            },
        },

        onReady: function (_, __, fp) {
            if (locale === "km" && fp.calendarContainer) {
                fp.calendarContainer.classList.add("khmer-numbers");
            }
        },
    });

    // ======================
    // TOM SELECT
    // ======================
    document.querySelectorAll(".tom-select").forEach((el) => {
        if (el.tomSelectInstance) return;

        el.tomSelectInstance = new TomSelect(el, {
            copyClassesToDropdown: false,
            dropdownClass: "dropdown-menu ts-dropdown",
            optionClass: "dropdown-item",
            controlInput: "<input>",
            create: false,
        });
    });
});
