import '../assets/styles/Header.css';

export default function Header() {
    return (
        <header>
            <div id="start">
                <a href="/"><img src="/EventifyListener.svg" alt="EventifyListener" /></a>
                <h1>EventifyListener</h1>
            </div>



            <div id="end">
                <nav>
                    <ul>
                        <li><a href="/artistes">Artistes</a></li>
                        <li><a href="/events">Évènements</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    )
}
