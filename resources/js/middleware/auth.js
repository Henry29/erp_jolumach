export default function auth({ next, router }) {
    if (!localStorage.getItem('Authorization')) {
        return router.push({ name: 'login' });
    }
    return next();
}