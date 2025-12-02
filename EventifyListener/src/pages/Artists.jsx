import { useEffect, useState } from "react";

export default function Artists() {
    const [artists, setArtists] = useState([]);
    const [error, setError] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetch("/api/artist")
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Erreur HTTP : ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                setArtists(data);
            })
            .catch((error) => {
                console.error("Erreur lors du fetch :", error);
                setError(error.message);
                setArtists([]);
            })
            .finally(() => setLoading(false));
    }, []);

    return (
        <div className="container text-center w-auto">
            <h1>Artistes</h1>
            <h2>Découvrez nos artistes</h2>

            {loading && <p>Chargement des artistes...</p>}
            {error && <p style={{ color: "red" }}>Erreur : {error}</p>}

            {!loading && !error && (
                <ul>
                    {artists.length > 0 ? (
                        artists.map((artist) => (
                            <li key={artist.id}>
                                <h3>{artist.name}</h3>
                                <p>{artist.description}</p>
                            </li>
                        ))
                    ) : (
                        <p>Aucun artiste disponible</p>
                    )}
                </ul>
            )}
        </div>
    );
}