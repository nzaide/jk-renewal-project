import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { createVuePlugin } from 'vite-plugin-vue2';

export default defineConfig({
    build: {
        manifest: true,
        assetsInlineLimit: 0,
    },
    plugins: [
        laravel([
            'resources/admin_scss/admin.scss',
            'resources/css/app.css',
            "resources/css/admin/job-posts.css",
            "resources/css/pages/about-us/show.css",
            'resources/css/pages/for-employers/show.css',
            'resources/js/app.js',
            'resources/js/admin/app.js',
            'resources/js/admin/admins/index.js',
            'resources/js/admin/applications/create.js',
            'resources/js/admin/applications/edit.js',
            'resources/js/admin/applications/index.js',
            'resources/js/admin/groups/index.js',
            'resources/js/admin/job-posts/index.js',
            'resources/js/admin/job-seekers/create.js',
            'resources/js/admin/job-seekers/edit.js',
            'resources/js/admin/job-seekers/search.js',
            'resources/js/admin/modals/mails/create.js',
            'resources/js/admin/modals/mails/index.js',
            'resources/js/admin/options/index.js',
            'resources/js/admin/pickup-jobs/index.js',
            'resources/js/admin/pickup-jobs/search.js',
            'resources/js/commonMethods.js',
            'resources/js/friend-referrals/create.js',
            'resources/js/index.js',
            'resources/js/member/academic-history/edit.js',
            'resources/js/member/auth/signin.js',
            'resources/js/member/auth/signup.js',
            'resources/js/member/company/company.js',
            'resources/js/member/edit.js',
            'resources/js/member/evaluation/add.js',
            'resources/js/member/evaluation/show.js',
            'resources/js/member/mypage/evaluation.js',
            'resources/js/member/mypage/top.js',
            'resources/js/member/qualificationandskill.js',
            'resources/js/member/registration/completion.js',
            'resources/js/member/show.js',
            'resources/js/member/job-offer/search.js',
            'resources/js/pages/for-employers/show.js',
            "resources/js/pages/about-us/show.js",
            'resources/scss/app.scss',
            'resources/scss/index.scss',
            'resources/vendor/jk-network-static/style.css',
            'resources/vendor/jk-network-static/index.js',
            'resources/vendor/jk-network-static/js/quick-website.js',
        ]),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        },
        createVuePlugin(),
    ],
});