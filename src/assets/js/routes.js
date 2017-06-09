import BasicData from './components/proposition/BasicData.vue';
import Categorization from './components/proposition/Categorization.vue';
import MarketPotential from './components/proposition/MarketPotential.vue';
import TechnicalData from './components/proposition/TechnicalData.vue';
import AuthorsExpense from './components/proposition/AuthorsExpense.vue';
import Print from './components/proposition/Print.vue';

export const routes = [
    { path: '/proposition/basic_data', component: BasicData },
    { path: '/proposition/categorization', component: Categorization },
    { path: '/proposition/market_potential', component: MarketPotential, title: 'Market Potential' },
    { path: '/proposition/technical_data', component: TechnicalData, title: 'Technical Data' },
    { path: '/proposition/print', component: Print, title: 'Print' },
    { path: '/proposition/authors_expense', component: AuthorsExpense, title: 'Authors Expense' }
];
