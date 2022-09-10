const translationsObject = {
    translations: {
        next: "Sonraki",
        no_results_found: "Gösterilecek sonuç yok.",
        of: "ile",
        per_page: " kayıt",
        previous: "Önceki",
        results: "sonuç",
        to: "gösterilen"
    }
}

export default translationsObject.translations

export function getTranslations() {
    return translationsObject.translations
}

export function setTranslation(key, value) {
    translationsObject.translations[key] = value
}

export function setTranslations(translations) {
    translationsObject.translations = translations
}
