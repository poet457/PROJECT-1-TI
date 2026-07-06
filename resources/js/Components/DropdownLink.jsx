import { Link } from '@inertiajs/react';

export default function DropdownLink({ href, method = 'get', as = 'a', children, ...props }) {
    if (as === 'button') {
        return (
            <button {...props} className="block w-full px-4 py-2 text-left text-sm text-slate-700 hover:bg-slate-100">
                {children}
            </button>
        );
    }

    return (
        <Link href={href} method={method} as={as} className="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100">
            {children}
        </Link>
    );
}
