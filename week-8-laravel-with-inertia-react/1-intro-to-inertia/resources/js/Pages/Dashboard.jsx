import GameCard from "@/Components/GameCard";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function Dashboard({ auth, games }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12 bg-gray-200">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                    <div className="grid grid-cols-3 gap-6 flex-wrap dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        {games.results.map((game) => {
                            return (
                                <GameCard
                                    key={game.id}
                                    image={game.background_image}
                                    name={game.name}
                                    slug={game.slug}
                                />
                            );
                        })}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
