module.exports = {
    theme: {
        container: {
            padding: '1.25rem',
            center: true,
        },
        extend: {
            fontFamily: {
                sans: [
                    'Titillium Web',
                    'Helvetica Neue',
                    'Helvetica',
                    'Arial',
                    'sans-serif',
                ],
                mono: ['Courier', 'monospace'],
            },
        },
        colors: {
            transparent: 'transparent',

            black: 'hsl(0, 0%, 0%)',
            white: 'hsl(0, 0%, 100%)',

            blue: {
                100: "hsl(210, 39%, 93%)",
                200: "hsl(210, 39%, 82%)",
                300: "hsl(210, 40%, 71%)",
                400: "hsl(210, 39%, 50%)",
                500: "hsl(210, 100%, 28%)",
                600: "hsl(210, 100%, 25%)",
                700: "hsl(210, 100%, 17%)",
                800: "hsl(210, 100%, 13%)",
                900: "hsl(209, 100%, 8%)",
            },
            cyan: {
                100: "hsl(201, 100%, 96%)",
                200: "hsl(202, 100%, 90%)",
                300: "hsl(202, 100%, 84%)",
                400: "hsl(202, 100%, 72%)",
                500: "hsl(202, 100%, 61%)",
                600: "hsl(202, 78%, 55%)",
                700: "hsl(202, 65%, 36%)",
                800: "hsl(202, 65%, 27%)",
                900: "hsl(202, 66%, 18%)",
            },
            gray: {
                100: "hsl(0, 0%, 98%)",
                200: "hsl(0, 0%, 96%)",
                300: "hsl(0, 0%, 94%)",
                400: "hsl(0, 0%, 90%)",
                500: "hsl(0, 0%, 85%)",
                600: "hsl(0, 0%, 77%)",
                700: "hsl(0, 0%, 51%)",
                800: "hsl(0, 0%, 38%)",
                900: "hsl(0, 0%, 25%)",
            },
            orange: {
                100: "hsl(35, 100%, 97%)",
                200: "hsl(37, 100%, 92%)",
                300: "hsl(36, 100%, 87%)",
                400: "hsl(36, 100%, 77%)",
                500: "hsl(36, 100%, 67%)",
                600: "hsl(36, 75%, 61%)",
                700: "hsl(36, 49%, 40%)",
                800: "hsl(36, 48%, 30%)",
                900: "hsl(36, 48%, 20%)",
            },
            teal: {
                100: "hsl(174, 72%, 94%)",
                200: "hsl(175, 72%, 86%)",
                300: "hsl(176, 72%, 77%)",
                400: "hsl(176, 72%, 60%)",
                500: "hsl(176, 95%, 43%)",
                600: "hsl(176, 95%, 39%)",
                700: "hsl(176, 95%, 26%)",
                800: "hsl(176, 96%, 19%)",
                900: "hsl(176, 94%, 13%)",
            },
            pink: {
                100: "hsl(330, 75%, 98%)",
                200: "hsl(332, 79%, 96%)",
                300: "hsl(331, 74%, 94%)",
                400: "hsl(333, 74%, 89%)",
                500: "hsl(333, 74%, 85%)",
                600: "hsl(332, 43%, 76%)",
                700: "hsl(334, 14%, 51%)",
                800: "hsl(334, 13%, 38%)",
                900: "hsl(333, 14%, 25%)",
            },
            red: {
                100: "hsl(0, 100%, 95%)",
                200: "hsl(0, 100%, 89%)",
                300: "hsl(0, 100%, 82%)",
                400: "hsl(0, 100%, 68%)",
                500: "hsl(0, 100%, 54%)",
                600: "hsl(0, 84%, 49%)",
                700: "hsl(0, 84%, 33%)",
                800: "hsl(0, 84%, 25%)",
                900: "hsl(0, 83%, 16%)",
            },
            yellow: {
                100: "hsl(49, 100%, 97%)",
                200: "hsl(48, 100%, 92%)",
                300: "hsl(48, 100%, 87%)",
                400: "hsl(48, 100%, 77%)",
                500: "hsl(48, 100%, 67%)",
                600: "hsl(48, 75%, 61%)",
                700: "hsl(48, 49%, 40%)",
                800: "hsl(48, 48%, 30%)",
                900: "hsl(48, 48%, 20%)",
            },
            green: {
                100: "hsl(146, 47%, 94%)",
                200: "hsl(145, 46%, 85%)",
                300: "hsl(144, 46%, 77%)",
                400: "hsl(146, 45%, 59%)",
                500: "hsl(145, 63%, 42%)",
                600: "hsl(145, 64%, 38%)",
                700: "hsl(146, 64%, 25%)",
                800: "hsl(145, 63%, 19%)",
                900: "hsl(146, 63%, 13%)",
            },
        },
        textStyles: theme => ({
            heading: {
                output: false, // this means there won't be a "heading" component in the CSS, but it can be extended
                fontWeight: theme('fontWeight.bold'),
                lineHeight: theme('lineHeight.tight'),
            },
            h1: {
                extends: 'heading', // this means all the styles in "heading" will be copied here; "extends" can also be an array to extend multiple text styles
                fontSize: theme('fontSize.3xl'),
                '@screen md': {
                    fontSize: theme('fontSize.4xl'),
                },
                '@screen lg': {
                    fontSize: theme('fontSize.5xl'),
                },
            },
            h2: {
                extends: 'heading',
                fontSize: theme('fontSize.2xl'),
                '@screen md': {
                    fontSize: theme('fontSize.3xl'),
                },
                '@screen lg': {
                    fontSize: theme('fontSize.4xl'),
                },
            },
            h3: {
                extends: 'heading',
                fontSize: theme('fontSize.xl'),
                '@screen md': {
                    fontSize: theme('fontSize.2xl'),
                },
                '@screen lg': {
                    fontSize: theme('fontSize.3xl'),
                },
            },
            h4: {
                extends: 'heading',
                fontSize: theme('fontSize.lg'),
                '@screen md': {
                    fontSize: theme('fontSize.xl'),
                },
                '@screen lg': {
                    fontSize: theme('fontSize.2xl'),
                },
            },
            list: {
                output: false,
                marginTop: theme('spacing.5'),
                marginBottom: theme('spacing.5'),
                marginLeft: theme('spacing.10'),

                li: {
                    marginTop: theme('spacing.1'),
                },
            },
            link: {
                fontWeight: theme('fontWeight.semibold'),
                color: theme('colors.primary.500'),
                textDecoration: 'underline',

                '&:hover': {
                    textDecoration: 'none',
                },
            },
            richText: {
                lineHeight: theme('lineHeight.relaxed'),
                '> * + *': {
                    marginTop: theme('spacing.5'),
                },
                h1: {
                    extends: 'h1',
                },
                h2: {
                    extends: 'h2',
                },
                h3: {
                    extends: 'h3',
                },
                h4: {
                    extends: 'h4',
                },
                h5: {
                    extends: 'h5',
                },
                h6: {
                    extends: 'h6',
                },
                ul: {
                    extends: 'list',
                    listStyleType: 'disc',
                },
                ol: {
                    extends: 'list',
                    listStyleType: 'decimal',
                },
                a: {
                    extends: 'link',
                },
                'b, strong': {
                    fontWeight: theme('fontWeight.bold'),
                },
                'i, em': {
                    fontStyle: 'italic',
                },
                iframe: {
                    width: '100%',
                },
                table: {
                    width: '100%',
                    fontSize: theme('fontSize.base'),
                },
                'tr:nth-child(2n)': {
                    backgroundColor: theme('colors.gray.100'),
                },
                td: {
                    paddingTop: theme('spacing.2'),
                    paddingBottom: theme('spacing.2'),
                    paddingLeft: theme('spacing.3'),
                    paddingRight: theme('spacing.3'),
                },
            },
        }),
    },
    variants: {},
    plugins: [
        //
        require('tailwindcss-typography')({
            componentPrefix: '', // the prefix to use for text style classes
        }),
    ],
};
