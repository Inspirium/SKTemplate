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

import Tasks from './components/tasks/Tasks.vue'
import TaskEdit from './components/tasks/TaskEdit.vue'
import TaskShow from './components/tasks/TaskShow.vue'
import DepartmentTasks from './components/tasks/DepartmentTasks.vue'


export const routes = [
    { path: '/proposition/basic_data', component: BasicData, name: 'basic_data' },
    { path: '/proposition/:id(\\d+)/start', component: PropositionStart },
    { path: '/proposition/:id(\\d+)/basic_data', component: BasicData, name: 'basic_data' },
    { path: '/proposition/categorization', component: Categorization },
    { path: '/proposition/:id(\\d+)/categorization', component: Categorization },
    { path: '/proposition/market_potential', component: MarketPotential },
    { path: '/proposition/:id(\\d+)/market_potential', component: MarketPotential },
    { path: '/proposition/technical_data', component: TechnicalData, name: 'technical_data' },
    { path: '/proposition/:id(\\d+)/technical_data', component: TechnicalData, name: 'technical_data' },
    { path: '/proposition/print', component: Print },
    { path: '/proposition/:id(\\d+)/print', component: Print },
    { path: '/proposition/authors_expense', component: AuthorsExpense },
    { path: '/proposition/:id(\\d+)/authors_expense', component: AuthorsExpense },
    { path: '/proposition/production_expense', component: ProductionExpense },
    { path: '/proposition/:id(\\d+)/production_expense', component: ProductionExpense },
    { path: '/proposition/marketing_expense', component: MarketingExpense },
    { path: '/proposition/:id(\\d+)/marketing_expense', component: MarketingExpense },
    { path: '/proposition/distribution_expense', component: DistributionExpense },
    { path: '/proposition/:id(\\d+)/distribution_expense', component: DistributionExpense },
    { path: '/proposition/layout_expense', component: LayoutExpense },
    { path: '/proposition/:id(\\d+)/layout_expense', component: LayoutExpense },
    { path: '/proposition/deadline', component: Deadline },
    { path: '/proposition/:id(\\d+)/deadline', component: Deadline },
    { path: '/proposition/calculation', component: Calculation },
    { path: '/proposition/:id(\\d+)/calculation', component: Calculation },
    { path: '/proposition/work_order', component: WorkOrder },

    { path: '/tasks', component: Tasks },
    { path: '/task/edit/:id(\\d+)?', component: TaskEdit },
    { path: '/task/show/:id(\\d+)', component: TaskShow },
    { path: '/tasks/department/:id(\\d+)', component: DepartmentTasks }
];
