import Proposition from './components/proposition/Proposition'
import BasicData from './components/proposition/BasicData'
import Categorization from './components/proposition/Categorization'
import MarketPotential from './components/proposition/MarketPotential'
import TechnicalData from './components/proposition/TechnicalData'
import AuthorsExpense from './components/proposition/AuthorsExpense'
import ExpenseAuthorsExpense from './components/proposition/expenses/AuthorsExpense'
import Print from './components/proposition/Print'
import ExpenseProductionExpense from './components/proposition/expenses/ProductionExpense'
import ProductionExpense from './components/proposition/ProductionExpense'
import MarketingExpense from './components/proposition/MarketingExpense'
import ExpenseMarketingExpense from './components/proposition/expenses/MarketingExpense'
import DistributionExpense from './components/proposition/DistributionExpense'
import LayoutExpense from './components/proposition/LayoutExpense'
import Deadline from './components/proposition/Deadline'
import Calculation from './components/proposition/Calculation'
import PropositionStart from './components/proposition/PropositionStart'
import Compare from './components/proposition/Compare'
import UploadDocument from './components/proposition/UploadDocument'
import Revisions from './components/proposition/Revisions'
import PriceDefinition from './components/proposition/PriceDefinition'
import Warehouse from './components/proposition/Warehouse'
import Marketing from './components/proposition/Marketing'
import Multimedia from './components/proposition/Multimedia'


import Tasks from './components/tasks/Tasks'
import TaskEdit from './components/tasks/TaskEdit'
import TaskShow from './components/tasks/TaskShow'

export const routes = [
    { path: '/proposition/start', component: PropositionStart },
    { path: '/proposition/:id(\\d+)', component: Proposition,
        children: [
            { path: 'start', component: PropositionStart, meta: {save : 'start'} },
            { path: 'edit/basic_data', component: BasicData, meta: {save : 'basic_data'} },
            { path: 'edit/categorization', component: Categorization, meta: {save : 'categorization'} },
            { path: 'edit/market_potential', component: MarketPotential, meta: {save : 'market_potential'} },
            { path: 'edit/technical_data', component: TechnicalData, meta: {save : 'technical_data'} },
            { path: 'edit/print', component: Print, meta: {save : 'print'} },
            { path: 'edit/authors_expense', component: AuthorsExpense, meta: {save : 'authors_expense'} },
            { path: 'edit/production_expense', component: ProductionExpense, meta: {save : 'production_expense'} },
            { path: 'edit/marketing_expense', component: MarketingExpense, meta: {save : 'marketing_expense'} },
            { path: 'edit/distribution_expense', component: DistributionExpense, meta: {save : 'distribution_expense'} },
            { path: 'edit/layout_expense', component: LayoutExpense, meta: {save : 'layout_expense'} },
            { path: 'edit/deadline', component: Deadline, meta: {save : 'deadline'} },
            { path: 'edit/calculation', component: Calculation, meta: {save : 'calculation'} },

            { path: 'preparation/translation', component: UploadDocument, meta: {dir: 'translation'} },
            { path: 'preparation/technical_preparation', component: UploadDocument, meta: {dir: 'technical_preparation'} },
            { path: 'preparation/proofreading', component: UploadDocument, meta: {dir: 'proofreading'} },
            { path: 'preparation/additional_materials', component: UploadDocument, meta: {dir: 'additional_materials'} },
            { path: 'preparation/reviews', component: UploadDocument, meta: {dir: 'reviews'} },
            { path: 'preparation/lecture', component: UploadDocument, meta: {dir: 'lecture'} },
            { path: 'preparation/technical_correction', component: UploadDocument, meta: {dir: 'technical_correction'} },
            { path: 'preparation/final_review', component: UploadDocument, meta: {dir: 'final_review'} },

            { path: 'expenses/authors_expense', component: ExpenseAuthorsExpense },
            { path: 'expenses/production_expense', component: ExpenseProductionExpense, meta: {save:'production_expense'} },
            { path: 'expenses/marketing_expense', component: ExpenseMarketingExpense, meta: { save: 'marketing_expense' } },
            { path: 'expenses/distribution_expense', component: DistributionExpense },
            { path: 'expenses/layout_expense', component: LayoutExpense },
            { path: 'expenses/compare', component: Compare, meta: {} },

            { path: 'design/cover_design', component: UploadDocument, meta: {dir: 'cover_design'} },
            { path: 'design/layout_design', component: UploadDocument, meta: {dir: 'layout_design'} },

            { path: 'layout/first_block_layout', component: UploadDocument, meta: {dir: 'first_block_layout'} },
            { path: 'layout/cover', component: UploadDocument, meta: {dir: 'cover'} },
            { path: 'layout/layout', component: UploadDocument, meta: {dir: 'layout'} },
            { path: 'layout/first_revision', component: UploadDocument, meta: {dir: 'first_revision'} },
            { path: 'layout/correction', component: UploadDocument, meta: {dir: 'correction'} },
            { path: 'layout/correction_input', component: UploadDocument, meta: {dir: 'correction_input'} },
            { path: 'layout/revisions', component: Revisions },

            { path: 'final_price/price_definition', component: PriceDefinition },

            { path: 'prepress/print_proof', component: UploadDocument, meta: {dir: 'print_proof'} },
            { path: 'prepress/print_proof_correction', component: UploadDocument, meta: {dir: 'print_proof_correction'} },
            { path: 'prepress/print', component: UploadDocument, meta: {dir: 'print'} },
            { path: 'prepress/warehouse', component: Warehouse },

            { path: 'additionals/multimedia', component: Multimedia },
            { path: 'additionals/marketing', component: Marketing },

        ]
    },
    /*{ path: '/propositions', component: PropositionList },*/

    { path: '/tasks', component: Tasks },
    { path: '/task/edit/:id(\\d+)?', component: TaskEdit },
    { path: '/task/show/:id(\\d+)', component: TaskShow }
];
