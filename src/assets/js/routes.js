import BasicData from './components/proposition/BasicData.vue'
import Categorization from './components/proposition/Categorization.vue'
import MarketPotential from './components/proposition/MarketPotential.vue'
import TechnicalData from './components/proposition/TechnicalData.vue'
import AuthorsExpense from './components/proposition/AuthorsExpense.vue'
import Print from './components/proposition/Print.vue'
import ProductionExpense from './components/proposition/ProductionExpense.vue'
import MarketingExpense from './components/proposition/MarketingExpense.vue'
import DistributionExpense from './components/proposition/DistributionExpense.vue'
import LayoutExpense from './components/proposition/LayoutExpense.vue'
import Deadline from './components/proposition/Deadline.vue'
import Calculation from './components/proposition/Calculation.vue'
import WorkOrder from './components/proposition/WorkOrder.vue'
import PropositionStart from './components/proposition/PropositionStart.vue'


export const routes = [
    { path: '/proposition/basic_data', component: BasicData },
    { path: '/proposition/:id/start', component: PropositionStart },
    { path: '/proposition/:id/basic_data', component: BasicData },
    { path: '/proposition/categorization', component: Categorization },
    { path: '/proposition/:id/categorization', component: Categorization },
    { path: '/proposition/market_potential', component: MarketPotential },
    { path: '/proposition/:id/market_potential', component: MarketPotential },
    { path: '/proposition/technical_data', component: TechnicalData },
    { path: '/proposition/:id/technical_data', component: TechnicalData },
    { path: '/proposition/print', component: Print },
    { path: '/proposition/:id/print', component: Print },
    { path: '/proposition/authors_expense', component: AuthorsExpense },
    { path: '/proposition/:id/authors_expense', component: AuthorsExpense },
    { path: '/proposition/production_expense', component: ProductionExpense},
    { path: '/proposition/:id/production_expense', component: ProductionExpense},
    { path: '/proposition/marketing_expense', component: MarketingExpense},
    { path: '/proposition/:id/marketing_expense', component: MarketingExpense},
    { path: '/proposition/distribution_expense', component: DistributionExpense},
    { path: '/proposition/:id/distribution_expense', component: DistributionExpense},
    { path: '/proposition/layout_expense', component: LayoutExpense},
    { path: '/proposition/:id/layout_expense', component: LayoutExpense},
    { path: '/proposition/deadline', component: Deadline},
    { path: '/proposition/:id/deadline', component: Deadline},
    { path: '/proposition/calculation', component: Calculation},
    { path: '/proposition/:id/calculation', component: Calculation},
    { path: '/proposition/work_order', component: WorkOrder},
];
