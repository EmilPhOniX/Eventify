import { useEffect, useState } from "react";

export default function Events() {
    const [events, setEvents] = useState([]);
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetch("/api/event")
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                console.log("API Response:", data);

                if (data && Array.isArray(data)) {
                    setEvents(data);
                }
            })
            .catch((error) => {
                console.error("Erreur lors du fetch :", error);
                setError(error.message);
                setEvents([]);
            })
            .finally(() => setLoading(false));
    }, []);

    return (
        <div className="container text-center w-auto">
            <h1>Événements</h1>
            <h2>Retrouvez ici la liste des événements</h2>

            {loading && <p>Chargement des événements...</p>}

            {error && <p style={{ color: "red" }}>Erreur : {error}</p>}

            {!loading && !error && (
                <ul>
                    {events.length > 0 ? (
                        events.map((event) => (
                            <li key={event.id}>
                                <h3>{event.name}</h3>
                                <p>Date : {new Date(event.date).toLocaleDateString()}</p>
                            </li>
                        ))
                    ) : (
                        <p>Aucun événement disponible</p>
                    )}
                </ul>
            )}
        </div>
    );
}